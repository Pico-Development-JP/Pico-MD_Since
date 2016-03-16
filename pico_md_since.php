<?php
/**
 * Pico Markdown Extension: #since() Plugin
 * マークダウン拡張構文：#since()を実装(日付を指定して経過年数を表示)
 *
 * @author TakamiChie
 * @link http://onpu-tamago.net/
 * @license http://opensource.org/licenses/MIT
 * @version 1.1
 */
class Pico_MD_Since extends AbstractPicoPlugin {

  protected $enabled = false;

	public function onContentParsed(&$content)
	{
    $now = new DateTime();
  	$content = preg_replace_callback('/#since\(([\d\/\-]+)\)/', function($m) use ($now){
        $birth = new DateTime($m[1]);
        return $birth->diff($now)->format('%y');
      }, $content);
	}

}

?>
