<?php


$theme=config('t-components.theme','bootstrap5');
$prefix=config('t-components.prefix','');

if($prefix) $prefix.="-";

// dd($theme);
return [
	// 'container' => 'ajtarragona-web-components::components.'.$theme.'.container',
	// 'row' => 'ajtarragona-web-components::components.'.$theme.'.row',
	// 'col' => 'ajtarragona-web-components::components.'.$theme.'.col',
	$prefix.'icon' => 't-components::components.icon',
	$prefix.'nav' => 't-components::components.'.$theme.'.nav',
	$prefix.'alert' => 't-components::components.'.$theme.'.alert',
	// $prefix.'modal' => 't-components::components.'.$theme.'.modal',
	$prefix.'form' => 't-components::components.'.$theme.'.forms.form',
	$prefix.'button' => 't-components::components.'.$theme.'.forms.button',
	$prefix.'field' => 't-components::components.'.$theme.'.forms.field',
	$prefix.'text' => 't-components::components.'.$theme.'.forms.text',
	$prefix.'textarea' => 't-components::components.'.$theme.'.forms.textarea',
	$prefix.'texteditor' => 't-components::components.'.$theme.'.forms.texteditor',
	$prefix.'number' => 't-components::components.'.$theme.'.forms.number',
	$prefix.'select' => Ajtarragona\TComponents\Components\Forms\Select::class,
	// 't-select' => 't-components::components.'.$theme.'.forms.select_old',
	$prefix.'date' => 't-components::components.'.$theme.'.forms.date',
	$prefix.'iconPicker' => 't-components::components.'.$theme.'.forms.iconPicker',
	$prefix.'checkbox' => 't-components::components.'.$theme.'.forms.checkbox',
	$prefix.'radio' => 't-components::components.'.$theme.'.forms.radio',
	$prefix.'range' => 't-components::components.'.$theme.'.forms.range',
	// 't-file' => 't-components::components.'.$theme.'.forms.file',
	$prefix.'file' => Ajtarragona\TComponents\Components\Forms\File::class,
	// 'badge' => 'ajtarragona-web-components::components.'.$theme.'.badge',
	// 'card' => 'ajtarragona-web-components::components.'.$theme.'.card',
	// 'listgroup' => 'ajtarragona-web-components::components.'.$theme.'.listgroup',
	// 'table' => 'ajtarragona-web-components::components.'.$theme.'.table',
	// 'tabs' => 'ajtarragona-web-components::components.'.$theme.'.tabs',
	// 'tab' => 'ajtarragona-web-components::components.'.$theme.'.tab',
	// 'tabcontent' => 'ajtarragona-web-components::components.'.$theme.'.tabcontent',
	// 'tabpane' => 'ajtarragona-web-components::components.'.$theme.'.tabpane',
	// 'list' => 'ajtarragona-web-components::components.'.$theme.'.list',
	// 'li' => 'ajtarragona-web-components::components.'.$theme.'.listitem',
	// 'form' => 'ajtarragona-web-components::components.'.$theme.'.forms.form',
	// 'button' => 'ajtarragona-web-components::components.'.$theme.'.forms.button',
	// 'formgroup' => 'ajtarragona-web-components::components.'.$theme.'.forms.formgroup',
	// 'inputgroup' => 'ajtarragona-web-components::components.'.$theme.'.forms.inputgroup',
	// 'buttongroup' => 'ajtarragona-web-components::components.'.$theme.'.forms.buttongroup',
	// 'code' => 'ajtarragona-web-components::components.'.$theme.'.code',
	// 'block' => 'ajtarragona-web-components::components.'.$theme.'.block',
	// 'modal' => 'ajtarragona-web-components::components.'.$theme.'.modal',
	// 'modalopener' => 'ajtarragona-web-components::components.'.$theme.'.modalopener',
	// 'process'=> 'ajtarragona-web-components::components.'.$theme.'.process'
       
];

