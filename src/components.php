<?php


$theme=config('t-components.theme');
// dd($theme);
return [
	// 'container' => 'ajtarragona-web-components::components.'.$theme.'.container',
	// 'row' => 'ajtarragona-web-components::components.'.$theme.'.row',
	// 'col' => 'ajtarragona-web-components::components.'.$theme.'.col',
	't-icon' => 't-components::components.icon',
	't-nav' => 't-components::components.'.$theme.'.nav',
	't-alert' => 't-components::components.'.$theme.'.alert',
	't-modal' => 't-components::components.'.$theme.'.modal',
	't-form' => 't-components::components.'.$theme.'.forms.form',
	't-button' => 't-components::components.'.$theme.'.forms.button',
	't-field' => 't-components::components.'.$theme.'.forms.field',
	't-text' => 't-components::components.'.$theme.'.forms.text',
	't-textarea' => 't-components::components.'.$theme.'.forms.textarea',
	't-texteditor' => 't-components::components.'.$theme.'.forms.texteditor',
	't-number' => 't-components::components.'.$theme.'.forms.number',
	't-select' => Ajtarragona\TComponents\Components\Forms\Select::class,
	// 't-select' => 't-components::components.'.$theme.'.forms.select_old',
	't-date' => 't-components::components.'.$theme.'.forms.date',
	't-iconPicker' => 't-components::components.'.$theme.'.forms.iconPicker',
	't-checkbox' => 't-components::components.'.$theme.'.forms.checkbox',
	't-radio' => 't-components::components.'.$theme.'.forms.radio',
	't-range' => 't-components::components.'.$theme.'.forms.range',
	// 't-file' => 't-components::components.'.$theme.'.forms.file',
	't-file' => Ajtarragona\TComponents\Components\Forms\File::class,
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

