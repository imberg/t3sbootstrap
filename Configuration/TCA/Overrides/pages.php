<?php
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\ArrayUtility;

defined('TYPO3') || die();

# Extension configuration
$extconf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('t3sbootstrap');

$tempPagesColumns = [
	'tx_t3sbootstrap_smallColumns' => [
		'label' => 'Aside columns width',
		'exclude' => 1,
		'description' => 'makes no sense for Backend Layout "1 Column"',
		'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
				['1',1],
				['2',2],
				['3',3],
				['4',4],
				['6',6]
			],
			'default' => 3
		]
	],
	'tx_t3sbootstrap_container' => [
		'label' => 'Container (for the whole page)',
		'exclude' => 1,
		'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
				['no container','0'],
				['container','container'],
				['container-sm (< 576px)','container-sm'],
				['container-md (≥ 576px)','container-md'],
				['container-lg (≥ 768px)','container-lg'],
				['container-xl (≥ 992px)','container-xl'],
				['container-xxl (≥ 1200px)','container-xxl'],
				['container-fluid (≥ 1400px)','container-fluid']
			],
			'default' => 'container'
		]
	],
	'tx_t3sbootstrap_linkToTop' => [
		'exclude' => 1,
		'label' => 'Link to top',
		'config' => [
			'type' => 'check',
			'default' => 1
		]
	],
	'tx_t3sbootstrap_dropdownRight' => [
		'exclude' => 1,
		'label' => 'Dropdown menu right',
		'config' => [
			'type' => 'check',
		]
	],
	'tx_t3sbootstrap_megamenu' => [
		'exclude' => 1,
		'label' => 'Mega menu',
		'displayCond' => 'FIELD:doktype:=:4',
		'config' => [
			'type' => 'check',
		]
	],
	'tx_t3sbootstrap_mobileOrder' => [
		'label' => 'Aside order on mobile',
		'exclude' => 1,
		'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
				['Default','default'],
				['Top (both)','top'],
				['Bottom (both)','bottom'],
				['Left Aside Top','leftTop'],
				['Left Aside Bottom','leftBottom'],
				['Right Aside Top','rightTop'],
				['Right Aside Bottom','rightBottom']
			],
			'default' => 'default'
		]
	],
	'tx_t3sbootstrap_breakpoint' => [
		'label' => 'Breakpoint',
		'exclude' => 1,
		'config' => [
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => [
				['Default','md'],
				['sm','sm'],
				['md','md'],
				['lg','lg'],
				['xl','xl'],
				['xxl','xxl']
			],
			'default' => 'md'
		]
	],
	'tx_t3sbootstrap_fontawesome_icon' => [
		'exclude' => 1,
		'label'	=> 'e.g.: fab fa-typo3 fa-lg',
		'config' => [
			'type' => 'input',
			'size' => 20,
		]
	],
	'tx_t3sbootstrap_icon_only' => [
		'exclude' => 1,
		'label' => 'Icon only',
		'config' => [
				'type' => 'check',
		]
	],
	'tx_t3sbootstrap_titlecolor' => [
		'label' => 'Page Title Color',
		'exclude' => 1,
		'description' => 'Hex color codes, RGB or CSS variables e.g. var(--bs-primary)',
		'config' => [
			'type' => 'input',
			'size' => 20,
			'eval' => 'trim',
			'valuePicker' => [
				'items' => [
					['var(--bs-primary)', 'var(--bs-primary)'],
					['var(--bs-secondary)', 'var(--bs-secondary)'],
					['var(--bs-success)', 'var(--bs-success)'],
					['var(--bs-danger)', 'var(--bs-danger)'],
					['var(--bs-warning)', 'var(--bs-warning)'],
					['var(--bs-info)', 'var(--bs-info)']
				],
			],
		],
	],
	'tx_t3sbootstrap_subtitlecolor' => [
		'label' => 'Subtitle Color',
		'exclude' => 1,
		'description' => 'Hex color codes, RGB or CSS variables e.g. var(--bs-primary)',
		'config' => [
			'type' => 'input',
			'size' => 20,
			'eval' => 'trim',
			'valuePicker' => [
				'items' => [
					['var(--bs-primary)', 'var(--bs-primary)'],
					['var(--bs-secondary)', 'var(--bs-secondary)'],
					['var(--bs-success)', 'var(--bs-success)'],
					['var(--bs-danger)', 'var(--bs-danger)'],
					['var(--bs-warning)', 'var(--bs-warning)'],
					['var(--bs-info)', 'var(--bs-info)']
				],
			],
		],
	],
	'tx_t3sbootstrap_navigationcolor' => [
		'label' => 'Color',
		'displayCond' => 'USER:T3SBS\\T3sbootstrap\\UserFunction\\TcaMatcher->isDropdownMenu',
		'exclude' => 1,
		'description' => 'Hex color codes, RGB or CSS variables e.g. var(--bs-primary)',
		'config' => [
			'type' => 'input',
			'size' => 20,
			'eval' => 'trim',
			'valuePicker' => [
				'items' => [
					['var(--bs-primary)', 'var(--bs-primary)'],
					['var(--bs-secondary)', 'var(--bs-secondary)'],
					['var(--bs-success)', 'var(--bs-success)'],
					['var(--bs-danger)', 'var(--bs-danger)'],
					['var(--bs-warning)', 'var(--bs-warning)'],
					['var(--bs-info)', 'var(--bs-info)']
				],
			],
		],
	],
	'tx_t3sbootstrap_navigationactivecolor' => [
		'label' => 'Active Color',
		'displayCond' => 'USER:T3SBS\\T3sbootstrap\\UserFunction\\TcaMatcher->isDropdownMenu',
		'exclude' => 1,
		'description' => 'Hex color codes, RGB or CSS variables e.g. var(--bs-primary)',
		'config' => [
			'type' => 'input',
			'size' => 20,
			'eval' => 'trim',
			'valuePicker' => [
				'items' => [
					['var(--bs-primary)', 'var(--bs-primary)'],
					['var(--bs-secondary)', 'var(--bs-secondary)'],
					['var(--bs-success)', 'var(--bs-success)'],
					['var(--bs-danger)', 'var(--bs-danger)'],
					['var(--bs-warning)', 'var(--bs-warning)'],
					['var(--bs-info)', 'var(--bs-info)']
				],
			],
		],
	],
	'tx_t3sbootstrap_navigationhover' => [
		'label' => 'Hover Color',
		'displayCond' => 'USER:T3SBS\\T3sbootstrap\\UserFunction\\TcaMatcher->isDropdownMenu',
		'exclude' => 1,
		'description' => 'Hex color codes, RGB or CSS variables e.g. var(--bs-primary)',
		'config' => [
			'type' => 'input',
			'size' => 20,
			'eval' => 'trim',
			'valuePicker' => [
				'items' => [
					['var(--bs-primary)', 'var(--bs-primary)'],
					['var(--bs-secondary)', 'var(--bs-secondary)'],
					['var(--bs-success)', 'var(--bs-success)'],
					['var(--bs-danger)', 'var(--bs-danger)'],
					['var(--bs-warning)', 'var(--bs-warning)'],
					['var(--bs-info)', 'var(--bs-info)'],
					['text-light', 'text-light'],
					['text-dark', 'text-dark'],
					['text-body', 'text-body'],
					['text-muted', 'text-muted'],
					['text-white', 'text-white'],
					['text-black-50', 'text-black-50'],
					['text-white-50', 'text-white-50'],
					['text-uppercase', 'text-uppercase'],
					['text-capitalize', 'text-capitalize'],
					['text-left', 'text-start'],
					['text-center', 'text-center'],
					['text-right', 'text-end'],
					['font-weight-bold', 'font-weight-bold'],
					['font-weight-bolder', 'font-weight-bolder'],
					['font-weight-normal', 'font-weight-normal'],
					['font-weight-light', 'font-weight-light'],
					['font-weight-lighter', 'font-weight-lighter'],
					['font-italic', 'font-italic'],
					['font-normal', 'font-normal'],
					['display-1','display-1'],
					['display-2','display-2'],
					['display-3','display-3'],
					['display-4','display-4'],
					['display-5','display-5'],
					['display-6','display-6']
				],
			],
		],
	],
	'tx_t3sbootstrap_navigationbgcolor' => [
		'label' => 'Background Active & Hover Color',
		'displayCond' => 'USER:T3SBS\\T3sbootstrap\\UserFunction\\TcaMatcher->isDropdownMenu',
		'exclude' => 1,
		'description' => 'Hex color codes, RGB or CSS variables e.g. var(--bs-primary)',
		'config' => [
			'type' => 'input',
			'size' => 20,
			'eval' => 'trim',
			'valuePicker' => [
				'items' => [
					['var(--bs-primary)', 'var(--bs-primary)'],
					['var(--bs-secondary)', 'var(--bs-secondary)'],
					['var(--bs-success)', 'var(--bs-success)'],
					['var(--bs-danger)', 'var(--bs-danger)'],
					['var(--bs-warning)', 'var(--bs-warning)'],
					['var(--bs-info)', 'var(--bs-info)'],
					['text-light', 'text-light'],
					['text-dark', 'text-dark'],
					['text-body', 'text-body'],
					['text-muted', 'text-muted'],
					['text-white', 'text-white'],
					['text-black-50', 'text-black-50'],
					['text-white-50', 'text-white-50'],
					['text-uppercase', 'text-uppercase'],
					['text-capitalize', 'text-capitalize'],
					['text-left', 'text-start'],
					['text-center', 'text-center'],
					['text-right', 'text-end'],
					['font-weight-bold', 'font-weight-bold'],
					['font-weight-bolder', 'font-weight-bolder'],
					['font-weight-normal', 'font-weight-normal'],
					['font-weight-light', 'font-weight-light'],
					['font-weight-lighter', 'font-weight-lighter'],
					['font-italic', 'font-italic'],
					['font-normal', 'font-normal'],
					['display-1','display-1'],
					['display-2','display-2'],
					['display-3','display-3'],
					['display-4','display-4'],
					['display-5','display-5'],
					['display-6','display-6']
				],
			],
		],
	]
];

ExtensionManagementUtility::addTCAcolumns('pages',$tempPagesColumns);
unset($tempPagesColumns);

ExtensionManagementUtility::addFieldsToPalette('pages', 'title','--linebreak--,tx_t3sbootstrap_titlecolor','after:title');
ExtensionManagementUtility::addFieldsToPalette('pages', 'title','--linebreak--,tx_t3sbootstrap_subtitlecolor','after:subtitle');
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout','--linebreak--,tx_t3sbootstrap_smallColumns','after:backend_layout_next_level');
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout','--linebreak--,tx_t3sbootstrap_mobileOrder','after:tx_t3sbootstrap_smallColumns');
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout','--linebreak--,tx_t3sbootstrap_breakpoint','after:tx_t3sbootstrap_mobileOrder');
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout','--linebreak--,tx_t3sbootstrap_dropdownRight','after:tx_t3sbootstrap_breakpoint');
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout','--linebreak--,tx_t3sbootstrap_container','after:tx_t3sbootstrap_dropdownRight');
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout','--linebreak--,tx_t3sbootstrap_linkToTop','after:tx_t3sbootstrap_container');
ExtensionManagementUtility::addFieldsToPalette('pages', 'layout','--linebreak--,tx_t3sbootstrap_megamenu','after:tx_t3sbootstrap_linkToTop');

if (array_key_exists('navigationColor', $extconf) && $extconf['navigationColor'] === '1') {
	# add palette Navigation Colors
	ExtensionManagementUtility::addToAllTCAtypes(
		'pages',
		'--palette--; Navigation Colors for dropdown items;navColors',
		'',
		'after:title'
	);

	ExtensionManagementUtility::addFieldsToPalette(
		'pages', 'navColors','--linebreak--,tx_t3sbootstrap_navigationcolor','after:tx_t3sbootstrap_subtitlecolor'
	);
	ExtensionManagementUtility::addFieldsToPalette(
		'pages', 'navColors','--linebreak--,tx_t3sbootstrap_navigationactivecolor','after:tx_t3sbootstrap_navigationcolor'
	);
	ExtensionManagementUtility::addFieldsToPalette(
		'pages', 'navColors','--linebreak--,tx_t3sbootstrap_navigationhover','after:tx_t3sbootstrap_navigationactivecolor'
	);
	ExtensionManagementUtility::addFieldsToPalette(
		'pages', 'navColors','--linebreak--,tx_t3sbootstrap_navigationbgcolor','after:tx_t3sbootstrap_navigationhover'
	);
}

if (array_key_exists('fontawesome', $extconf) && $extconf['fontawesome'] === '1') {

	$GLOBALS['TCA']['pages']['palettes']['fontawesome'] = [
		 'showitem' => 'tx_t3sbootstrap_fontawesome_icon,
				tx_t3sbootstrap_icon_only',
			 'canNotCollapse' => 1
	];

	ExtensionManagementUtility::addToAllTCAtypes(
		'pages',
		'--palette--;Fontawesome Icon;fontawesome',
		'',
		'after:layout'
	);
}


$menuheader = 198;

// Add new page type:
$GLOBALS['PAGES_TYPES'][$menuheader] = [
	'allowedTables' => '*',
];

// Add new page type as possible select item:
ExtensionManagementUtility::addTcaSelectItem(
	'pages',
	'doktype',
	[
		'Dropdownmenu header',
		$menuheader,
		'content-header'
	],
	'2',
	'after'
);

// Add icon for new page type:
ArrayUtility::mergeRecursiveWithOverrule(
	$GLOBALS['TCA']['pages'],
	[
		'ctrl' => [
			'typeicon_classes' => [
				$menuheader => 'content-header',
			],
		],
	]
);

/***************
 * Register PageTSConfig Files
*/
ExtensionManagementUtility::registerPageTSConfigFile(
	't3sbootstrap',
	'Configuration/TSConfig/Registered/Textpic.tsconfig',
	'Remove CType textpic'
);
ExtensionManagementUtility::registerPageTSConfigFile(
	't3sbootstrap',
	'Configuration/TSConfig/Registered/Text.tsconfig',
	'Remove CType text'
);
ExtensionManagementUtility::registerPageTSConfigFile(
	't3sbootstrap',
	'Configuration/TSConfig/Registered/Image.tsconfig',
	'Remove CType image'
);
ExtensionManagementUtility::registerPageTSConfigFile(
	't3sbootstrap',
	'Configuration/TSConfig/Registered/Header.tsconfig',
	'Remove CType header'
);
ExtensionManagementUtility::registerPageTSConfigFile(
	't3sbootstrap',
	'Configuration/TSConfig/Registered/Callouts.tsconfig',
	'Add BS-Callouts options in Layout field'
);
