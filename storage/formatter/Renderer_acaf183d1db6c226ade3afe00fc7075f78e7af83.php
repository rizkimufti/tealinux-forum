<?php

/**
* @package   s9e\TextFormatter
* @copyright Copyright (c) 2010-2016 The s9e Authors
* @license   http://www.opensource.org/licenses/mit-license.php The MIT License
*/
class Renderer_acaf183d1db6c226ade3afe00fc7075f78e7af83 extends \s9e\TextFormatter\Renderer
{
	protected $params=array('DISCUSSION_URL'=>'','PROFILE_URL'=>'');
	protected static $tagBranches=array('B'=>0,'C'=>1,'CENTER'=>2,'CODE'=>3,'COLOR'=>4,'DEL'=>5,'EM'=>6,'EMAIL'=>7,'EMOJI'=>8,'ESC'=>9,'FLAGROW_FILE_FILE'=>10,'FLAGROW_FILE_IMAGE'=>11,'H1'=>12,'H2'=>13,'H3'=>14,'H4'=>15,'H5'=>16,'H6'=>17,'HR'=>18,'I'=>19,'IMG'=>20,'LI'=>21,'LIST'=>22,'POSTMENTION'=>23,'QUOTE'=>24,'S'=>25,'SIZE'=>26,'STRONG'=>27,'SUP'=>28,'U'=>29,'UPL-FILE'=>30,'UPL-IMAGE'=>31,'UPL-IMAGE-PREVIEW'=>32,'URL'=>33,'USERMENTION'=>34,'br'=>35,'e'=>36,'i'=>36,'s'=>36,'p'=>37);
	public function __sleep()
	{
		$props = get_object_vars($this);
		unset($props['out'], $props['proc'], $props['source']);
		return array_keys($props);
	}
	public function renderRichText($xml)
	{
		if (!isset($this->quickRenderingTest) || !preg_match($this->quickRenderingTest, $xml))
			try
			{
				return $this->renderQuick($xml);
			}
			catch (\Exception $e)
			{
			}
		$dom = $this->loadXML($xml);
		$this->out = '';
		$this->at($dom->documentElement);
		return $this->out;
	}
	protected function at(\DOMNode $root)
	{
		if ($root->nodeType === 3)
			$this->out .= htmlspecialchars($root->textContent,0);
		else
			foreach ($root->childNodes as $node)
				if (!isset(self::$tagBranches[$node->nodeName]))
					$this->at($node);
				else
				{
					$tb = self::$tagBranches[$node->nodeName];
					if($tb<19)if($tb<10)if($tb<5)if($tb<3)if($tb===0){$this->out.='<b>';$this->at($node);$this->out.='</b>';}elseif($tb===1){$this->out.='<code>';$this->at($node);$this->out.='</code>';}else{$this->out.='<div style="text-align:center">';$this->at($node);$this->out.='</div>';}elseif($tb===3){$this->out.='<pre data-hljs="" data-s9e-livepreview-postprocess="if(\'undefined\'!==typeof hljs)hljs._hb(this)"><code';if($node->hasAttribute('lang'))$this->out.=' class="language-'.htmlspecialchars($node->getAttribute('lang'),2).'"';$this->out.='>';$this->at($node);$this->out.='</code></pre><script>if("undefined"!==typeof hljs)hljs._ha();else if("undefined"===typeof hljsLoading){hljsLoading=1;var a=document.getElementsByTagName("head")[0],e=document.createElement("link");e.type="text/css";e.rel="stylesheet";e.href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/styles/default.min.css";a.appendChild(e);e=document.createElement("script");e.type="text/javascript";e.onload=function(){var d={},f=0;hljs._hb=function(b){b.removeAttribute("data-hljs");var c=b.innerHTML;c in d?b.innerHTML=d[c]:(7<++f&&(d={},f=0),hljs.highlightBlock(b.firstChild),d[c]=b.innerHTML)};hljs._ha=function(){for(var b=document.querySelectorAll("pre[data-hljs]"),c=b.length;0<c;)hljs._hb(b.item(--c))};hljs._ha()};e.async=!0;e.src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/highlight.min.js";a.appendChild(e)}</script>';}else{$this->out.='<span style="color:'.htmlspecialchars($node->getAttribute('color'),2).'">';$this->at($node);$this->out.='</span>';}elseif($tb<8)if($tb===5){$this->out.='<del>';$this->at($node);$this->out.='</del>';}elseif($tb===6){$this->out.='<em>';$this->at($node);$this->out.='</em>';}else{$this->out.='<a href="mailto:'.htmlspecialchars($node->getAttribute('email'),2).'">';$this->at($node);$this->out.='</a>';}elseif($tb===8)$this->out.='<img alt="'.htmlspecialchars($node->textContent,2).'" class="emoji" draggable="false" src="//cdn.jsdelivr.net/emojione/assets/png/'.htmlspecialchars($node->getAttribute('seq'),2).'.png">';else$this->at($node);elseif($tb<15)if($tb<13)if($tb===10)$this->out.='<div class="ButtonGroup"><div class="Button hasIcon Button--icon Button--primary flagrow-download-button" data-uuid="'.htmlspecialchars($node->getAttribute('uuid'),2).'"><i class="fa fa-download"></i></div><div class="Button">'.htmlspecialchars($node->getAttribute('base_name'),0).'</div><div class="Button">'.htmlspecialchars($node->getAttribute('size'),0).'</div></div>';elseif($tb===11)$this->out.='<div class="flagrow-download row"><div class="card"><div class="wrapper" style="background: url('.htmlspecialchars($node->getAttribute('url'),2).') center / cover no-repeat"><div class="header"><ul class="menu-content"><li><div href="#" class="fa fa-hdd-o"><span>'.htmlspecialchars($node->getAttribute('size'),0).'</span></div></li></ul></div><div class="data"><div class="content"><h4 class="title">'.htmlspecialchars($node->getAttribute('base_name'),0).'</h4><div class="flagrow-download-button Button Button--primary Button-icon Button--block" data-uuid="'.htmlspecialchars($node->getAttribute('uuid'),2).'"><i class="fa fa-download"></i></div></div></div></div></div></div>';else{$this->out.='<h1>';$this->at($node);$this->out.='</h1>';}elseif($tb===13){$this->out.='<h2>';$this->at($node);$this->out.='</h2>';}else{$this->out.='<h3>';$this->at($node);$this->out.='</h3>';}elseif($tb===15){$this->out.='<h4>';$this->at($node);$this->out.='</h4>';}elseif($tb===16){$this->out.='<h5>';$this->at($node);$this->out.='</h5>';}elseif($tb===17){$this->out.='<h6>';$this->at($node);$this->out.='</h6>';}else$this->out.='<hr>';elseif($tb<29)if($tb<24)if($tb<22)if($tb===19){$this->out.='<i>';$this->at($node);$this->out.='</i>';}elseif($tb===20)$this->out.='<img src="'.htmlspecialchars($node->getAttribute('src'),2).'" title="'.htmlspecialchars($node->getAttribute('title'),2).'" alt="'.htmlspecialchars($node->getAttribute('alt'),2).'">';else{$this->out.='<li>';$this->at($node);$this->out.='</li>';}elseif($tb===22)if(!$node->hasAttribute('type')){$this->out.='<ul>';$this->at($node);$this->out.='</ul>';}elseif((strpos($node->getAttribute('type'),'upper')===0)||(strpos($node->getAttribute('type'),'upper')===0)||(strpos($node->getAttribute('type'),'upper')===0)){$this->out.='<ol style="list-style-type:'.htmlspecialchars($node->getAttribute('type'),2).'"';if($node->hasAttribute('start'))$this->out.=' start="'.htmlspecialchars($node->getAttribute('start'),2).'"';$this->out.='>';$this->at($node);$this->out.='</ol>';}else{$this->out.='<ul style="list-style-type:'.htmlspecialchars($node->getAttribute('type'),2).'">';$this->at($node);$this->out.='</ul>';}else$this->out.='<a href="'.htmlspecialchars($this->params['DISCUSSION_URL'].$node->getAttribute('discussionid'),2).'/'.htmlspecialchars($node->getAttribute('number'),2).'" class="PostMention" data-id="'.htmlspecialchars($node->getAttribute('id'),2).'">'.htmlspecialchars($node->getAttribute('username'),0).'</a>';elseif($tb<27)if($tb===24){$this->out.='<blockquote';if(!$node->hasAttribute('author'))$this->out.=' class="uncited"';$this->out.='><div>';if($node->hasAttribute('author'))$this->out.='<cite>'.htmlspecialchars($node->getAttribute('author'),0).' wrote:</cite>';$this->at($node);$this->out.='</div></blockquote>';}elseif($tb===25){$this->out.='<s>';$this->at($node);$this->out.='</s>';}else{$this->out.='<span style="font-size:'.htmlspecialchars($node->getAttribute('size'),2).'px">';$this->at($node);$this->out.='</span>';}elseif($tb===27){$this->out.='<strong>';$this->at($node);$this->out.='</strong>';}else{$this->out.='<sup>';$this->at($node);$this->out.='</sup>';}elseif($tb<34){if($tb<32)if($tb===29){$this->out.='<u>';$this->at($node);$this->out.='</u>';}elseif($tb===30)$this->out.='<div class="ButtonGroup"><div class="Button hasIcon Button--icon Button--primary flagrow-download-button" data-uuid="'.htmlspecialchars($node->getAttribute('uuid'),2).'"><i class="fa fa-download"></i></div><div class="Button">'.htmlspecialchars($node->getAttribute('content'),0).'</div><div class="Button">'.htmlspecialchars($node->getAttribute('size'),0).'</div></div>';else$this->out.='<div class="flagrow-download row"><div class="card"><div class="wrapper" style="background: url('.htmlspecialchars($node->getAttribute('url'),2).') center / cover no-repeat"><div class="header"><ul class="menu-content"><li><div href="#" class="fa fa-hdd-o"><span>'.htmlspecialchars($node->getAttribute('size'),0).'</span></div></li></ul></div><div class="data"><div class="content"><h4 class="title">'.htmlspecialchars($node->getAttribute('content'),0).'</h4><div class="flagrow-download-button Button Button--primary Button-icon Button--block" data-uuid="'.htmlspecialchars($node->getAttribute('uuid'),2).'"><i class="fa fa-download"></i></div></div></div></div></div></div>';elseif($tb===32)$this->out.='<img src="'.htmlspecialchars($node->getAttribute('url'),2).'" title="'.htmlspecialchars($node->getAttribute('base_name'),2).'">';else{$this->out.='<a href="'.htmlspecialchars($node->getAttribute('url'),2).'" target="_blank" rel="nofollow noreferrer"';if($node->hasAttribute('title'))$this->out.=' title="'.htmlspecialchars($node->getAttribute('title'),2).'"';$this->out.='>';$this->at($node);$this->out.='</a>';}}elseif($tb===34)$this->out.='<a href="'.htmlspecialchars($this->params['PROFILE_URL'].$node->getAttribute('username'),2).'" class="UserMention">@'.htmlspecialchars($node->getAttribute('username'),0).'</a>';elseif($tb===35)$this->out.='<br>';elseif($tb===36);else{$this->out.='<p>';$this->at($node);$this->out.='</p>';}
				}
	}
	private static $static=array('/B'=>'</b>','/C'=>'</code>','/CENTER'=>'</div>','/CODE'=>'</code></pre><script>if("undefined"!==typeof hljs)hljs._ha();else if("undefined"===typeof hljsLoading){hljsLoading=1;var a=document.getElementsByTagName("head")[0],e=document.createElement("link");e.type="text/css";e.rel="stylesheet";e.href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/styles/default.min.css";a.appendChild(e);e=document.createElement("script");e.type="text/javascript";e.onload=function(){var d={},f=0;hljs._hb=function(b){b.removeAttribute("data-hljs");var c=b.innerHTML;c in d?b.innerHTML=d[c]:(7<++f&&(d={},f=0),hljs.highlightBlock(b.firstChild),d[c]=b.innerHTML)};hljs._ha=function(){for(var b=document.querySelectorAll("pre[data-hljs]"),c=b.length;0<c;)hljs._hb(b.item(--c))};hljs._ha()};e.async=!0;e.src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.7.0/highlight.min.js";a.appendChild(e)}</script>','/COLOR'=>'</span>','/DEL'=>'</del>','/EM'=>'</em>','/EMAIL'=>'</a>','/ESC'=>'','/H1'=>'</h1>','/H2'=>'</h2>','/H3'=>'</h3>','/H4'=>'</h4>','/H5'=>'</h5>','/H6'=>'</h6>','/I'=>'</i>','/LI'=>'</li>','/QUOTE'=>'</div></blockquote>','/S'=>'</s>','/SIZE'=>'</span>','/STRONG'=>'</strong>','/SUP'=>'</sup>','/U'=>'</u>','/URL'=>'</a>','B'=>'<b>','C'=>'<code>','CENTER'=>'<div style="text-align:center">','DEL'=>'<del>','EM'=>'<em>','ESC'=>'','H1'=>'<h1>','H2'=>'<h2>','H3'=>'<h3>','H4'=>'<h4>','H5'=>'<h5>','H6'=>'<h6>','HR'=>'<hr>','I'=>'<i>','LI'=>'<li>','S'=>'<s>','STRONG'=>'<strong>','SUP'=>'<sup>','U'=>'<u>');
	private static $dynamic=array('COLOR'=>array('(^[^ ]+(?> (?!color=)[^=]+="[^"]*")*(?> color="([^"]*)")?.*)s','<span style="color:$1">'),'EMAIL'=>array('(^[^ ]+(?> (?!email=)[^=]+="[^"]*")*(?> email="([^"]*)")?.*)s','<a href="mailto:$1">'),'IMG'=>array('(^[^ ]+(?> (?!(?>alt|src|title)=)[^=]+="[^"]*")*(?> alt="([^"]*)")?(?> (?!(?>src|title)=)[^=]+="[^"]*")*(?> src="([^"]*)")?(?> (?!title=)[^=]+="[^"]*")*(?> title="([^"]*)")?.*)s','<img src="$2" title="$3" alt="$1">'),'SIZE'=>array('(^[^ ]+(?> (?!size=)[^=]+="[^"]*")*(?> size="([^"]*)")?.*)s','<span style="font-size:$1px">'),'UPL-IMAGE-PREVIEW'=>array('(^[^ ]+(?> (?!(?>base_name|url)=)[^=]+="[^"]*")*(?> base_name="([^"]*)")?(?> (?!url=)[^=]+="[^"]*")*(?> url="([^"]*)")?.*)s','<img src="$2" title="$1">'),'URL'=>array('(^[^ ]+(?> (?!(?>title|url)=)[^=]+="[^"]*")*( title="[^"]*")?(?> (?!url=)[^=]+="[^"]*")*(?> url="([^"]*)")?.*)s','<a href="$2" target="_blank" rel="nofollow noreferrer"$1>'));
	private static $attributes;
	private static $quickBranches=array('/LIST'=>0,'CODE'=>1,'EMOJI'=>2,'FLAGROW_FILE_FILE'=>3,'FLAGROW_FILE_IMAGE'=>4,'LIST'=>5,'POSTMENTION'=>6,'QUOTE'=>7,'UPL-FILE'=>8,'UPL-IMAGE'=>9,'USERMENTION'=>10);

	protected function renderQuick($xml)
	{
		$xml = $this->decodeSMP($xml);
		self::$attributes = array();
		$html = preg_replace_callback(
			'(<(?:(?!/)((?:EMOJI|FLAGROW_FILE_(?>FIL|IMAG)E|HR|IMG|POSTMENTION|U(?:PL-(?:FILE|IMAGE(?>-PREVIEW)?)|SERMENTION)))(?: [^>]*)?>.*?</\\1|(/?(?!br/|p>)[^ />]+)[^>]*?(/)?)>)s',
			array($this, 'quick'),
			preg_replace(
				'(<[eis]>[^<]*</[eis]>)',
				'',
				substr($xml, 1 + strpos($xml, '>'), -4)
			)
		);

		return str_replace('<br/>', '<br>', $html);
	}

	protected function quick($m)
	{
		if (isset($m[2]))
		{
			$id = $m[2];

			if (isset($m[3]))
			{
				unset($m[3]);

				$m[0] = substr($m[0], 0, -2) . '>';
				$html = $this->quick($m);

				$m[0] = '</' . $id . '>';
				$m[2] = '/' . $id;
				$html .= $this->quick($m);

				return $html;
			}
		}
		else
		{
			$id = $m[1];

			$lpos = 1 + strpos($m[0], '>');
			$rpos = strrpos($m[0], '<');
			$textContent = substr($m[0], $lpos, $rpos - $lpos);

			if (strpos($textContent, '<') !== false)
				throw new \RuntimeException;

			$textContent = htmlspecialchars_decode($textContent);
		}

		if (isset(self::$static[$id]))
			return self::$static[$id];

		if (isset(self::$dynamic[$id]))
		{
			list($match, $replace) = self::$dynamic[$id];
			return preg_replace($match, $replace, $m[0], 1);
		}

		if (!isset(self::$quickBranches[$id]))
		{
			if ($id[0] === '!' || $id[0] === '?')
				throw new \RuntimeException;
			return '';
		}

		$attributes = array();
		if (strpos($m[0], '="') !== false)
		{
			preg_match_all('(([^ =]++)="([^"]*))S', substr($m[0], 0, strpos($m[0], '>')), $matches);
			foreach ($matches[1] as $i => $attrName)
				$attributes[$attrName] = $matches[2][$i];
		}

		$qb = self::$quickBranches[$id];
		if($qb<6)if($qb<3)if($qb===0){$attributes=array_pop(self::$attributes);$html='';if(!isset($attributes['type']))$html.='</ul>';elseif((strpos($attributes['type'],'upper')===0)||(strpos($attributes['type'],'upper')===0)||(strpos($attributes['type'],'upper')===0))$html.='</ol>';else$html.='</ul>';}elseif($qb===1){$html='<pre data-hljs="" data-s9e-livepreview-postprocess="if(\'undefined\'!==typeof hljs)hljs._hb(this)"><code';if(isset($attributes['lang']))$html.=' class="language-'.$attributes['lang'].'"';$html.='>';}else{$attributes+=array('seq'=>null);$html='<img alt="'.htmlspecialchars($textContent,2).'" class="emoji" draggable="false" src="//cdn.jsdelivr.net/emojione/assets/png/'.$attributes['seq'].'.png">';}elseif($qb===3){$attributes+=array('uuid'=>null,'base_name'=>null,'size'=>null);$html='<div class="ButtonGroup"><div class="Button hasIcon Button--icon Button--primary flagrow-download-button" data-uuid="'.$attributes['uuid'].'"><i class="fa fa-download"></i></div><div class="Button">'.str_replace('&quot;','"',$attributes['base_name']).'</div><div class="Button">'.str_replace('&quot;','"',$attributes['size']).'</div></div>';}elseif($qb===4){$attributes+=array('url'=>null,'size'=>null,'base_name'=>null,'uuid'=>null);$html='<div class="flagrow-download row"><div class="card"><div class="wrapper" style="background: url('.$attributes['url'].') center / cover no-repeat"><div class="header"><ul class="menu-content"><li><div href="#" class="fa fa-hdd-o"><span>'.str_replace('&quot;','"',$attributes['size']).'</span></div></li></ul></div><div class="data"><div class="content"><h4 class="title">'.str_replace('&quot;','"',$attributes['base_name']).'</h4><div class="flagrow-download-button Button Button--primary Button-icon Button--block" data-uuid="'.$attributes['uuid'].'"><i class="fa fa-download"></i></div></div></div></div></div></div>';}else{$attributes+=array('type'=>null);$html='';if(!isset($attributes['type']))$html.='<ul>';elseif((strpos($attributes['type'],'upper')===0)||(strpos($attributes['type'],'upper')===0)||(strpos($attributes['type'],'upper')===0)){$html.='<ol style="list-style-type:'.$attributes['type'].'"';if(isset($attributes['start']))$html.=' start="'.$attributes['start'].'"';$html.='>';}else$html.='<ul style="list-style-type:'.$attributes['type'].'">';self::$attributes[]=$attributes;}elseif($qb<9)if($qb===6){$attributes+=array('discussionid'=>null,'number'=>null,'id'=>null,'username'=>null);$html='<a href="'.htmlspecialchars($this->params['DISCUSSION_URL'].htmlspecialchars_decode($attributes['discussionid']),2).'/'.$attributes['number'].'" class="PostMention" data-id="'.$attributes['id'].'">'.str_replace('&quot;','"',$attributes['username']).'</a>';}elseif($qb===7){$html='<blockquote';if(!isset($attributes['author']))$html.=' class="uncited"';$html.='><div>';if(isset($attributes['author']))$html.='<cite>'.str_replace('&quot;','"',$attributes['author']).' wrote:</cite>';}else{$attributes+=array('uuid'=>null,'content'=>null,'size'=>null);$html='<div class="ButtonGroup"><div class="Button hasIcon Button--icon Button--primary flagrow-download-button" data-uuid="'.$attributes['uuid'].'"><i class="fa fa-download"></i></div><div class="Button">'.str_replace('&quot;','"',$attributes['content']).'</div><div class="Button">'.str_replace('&quot;','"',$attributes['size']).'</div></div>';}elseif($qb===9){$attributes+=array('url'=>null,'size'=>null,'content'=>null,'uuid'=>null);$html='<div class="flagrow-download row"><div class="card"><div class="wrapper" style="background: url('.$attributes['url'].') center / cover no-repeat"><div class="header"><ul class="menu-content"><li><div href="#" class="fa fa-hdd-o"><span>'.str_replace('&quot;','"',$attributes['size']).'</span></div></li></ul></div><div class="data"><div class="content"><h4 class="title">'.str_replace('&quot;','"',$attributes['content']).'</h4><div class="flagrow-download-button Button Button--primary Button-icon Button--block" data-uuid="'.$attributes['uuid'].'"><i class="fa fa-download"></i></div></div></div></div></div></div>';}else{$attributes+=array('username'=>null);$html='<a href="'.htmlspecialchars($this->params['PROFILE_URL'].htmlspecialchars_decode($attributes['username']),2).'" class="UserMention">@'.str_replace('&quot;','"',$attributes['username']).'</a>';}

		return $html;
	}
}