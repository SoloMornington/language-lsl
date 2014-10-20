<?php

namespace Mile23\Command;

use Mile23\Sitemap\LslKeywordExtractor;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

class LslExtractCommand extends Command {

  protected $container;

  protected function configure() {
    $this
      ->setName('convert')
      ->setDescription('Convert all the keywords to cson.')
      ->addArgument(
        'filepath', InputArgument::REQUIRED, 'Filepath to the XML input.'
    );
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $f = $input->getArgument('filepath');

    $xml = \file_get_contents($f);
    $crawler = new Crawler($xml);

    // The crawler for our keywords.
    $keywords_map = $crawler->filterXPath('//llsd/map/map/key');
    // Extract the values of the XML elements.
    $keywords = $keywords_map->extract('_text');

    // CSON template.
    $cson = "'.source.esl, .source.lsl':
  'editor':
    'completions': [\n";
    // Add our keywords.
    foreach ($keywords as $keyword) {
      $cson .= "      '$keyword'\n";
    }
    // Close the array.
    $cson .= '    ]';

    // Write it out.
    // @todo: Add output filepath option to this command.
    \file_put_contents('language-lsl.cson' , $cson);
  }

}
