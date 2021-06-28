<?php
$wgHooks['ParserFirstCallInit'][] = 'WaveDrom::onParserSetup';
class WaveDrom {
      // Register any render callbacks with the parser
      public static function onParserSetup( Parser $parser ) {
               // When the parser sees the <wavedrom> tag, it executes renderTagWavedrom (see below)
                  $parser->setHook( 'wavedrom', 'WaveDrom::renderTagWavedrom' );
                  }
                  // Render <wavedrom>
  public static function renderTagWavedrom( $input, array $args, Parser $parser, PPFrame $frame ) {
    //$parser->addHeadItem(
    $parser->getOutput()->addHeadItem('<script src="https://cdnjs.cloudflare.com/ajax/libs/wavedrom/2.6.8/skins/default.js" type="text/javascript"></script>', 'WaveDromDefault');
    $parser->getOutput()->addHeadItem('<script src="https://cdnjs.cloudflare.com/ajax/libs/wavedrom/2.6.8/wavedrom.min.js" type="text/javascript"></script>', 'WaveDromMain');
    $parser->getOutput()->addHeadItem('<script>window.addEventListener(\'DOMContentLoaded\', WaveDrom.ProcessAll, false);</script>', 'WaveDromLoad');
    // Mediawiki add <p> and <pre> if newlines ...
    $inputstriped = str_replace(array("\n", "\r"), "", $input);
    return '<script type="WaveDrom">'.$inputstriped.'</script>';
  }
}
?>


