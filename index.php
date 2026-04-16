<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quick start. Local server-side application with UI</title>
	<script src="//api.bitrix24.com/api/v1/"></script>
</head>
<body>
	<div id="auth-data">OAuth 2.0 data from REQUEST:
	</div>

	<div class="root">
		<div class="install">
			<div class="install-title">Установить встройку в:</div>
			<button id="install-sidebar" onclick="bindSidebar()">сайдбар</button>
			<button id="install-smiles-selector" onclick="bindSmilesSelector()">селектор смайликов</button>
			<button id="install-textarea" onclick="bindTextarea()">поле ввода</button>
			<button id="install-navigation" onclick="bindNavigation()">навигацию</button>
			<button id="install-context-menu" onclick="bindContextMenu()">контекстное меню</button>
		</div>
		<div class="uninstall">
			<div class="uninstall-title">удалить встройку из:</div>
			<button	id="uninstall-sidebar" onclick="unbind(placements.sidebar)">сайдбара</button>
			<button id="uninstall-smiles-selector" onclick="unbind(placements.smilesSelector)">селектора смайликов</button>
			<button id="uninstall-textarea" onclick="unbind(placements.textarea)">поля ввода</button>
			<button id="uninstall-navigation" onclick="unbind(placements.navigation)">навигации</button>
			<button id="uninstall-context-menu" onclick="unbind(placements.contextMenu)">контекстного меню</button>
		</div>
	</div>
</body>
<script>
	const handlers = {
		sidebar: 'https://gist.githubusercontent.com/Solvanar/12a38371eaee9ebe12a64152056c72ef/raw/f291774ddf18b8ce987b2e33a1d88a1a4aa5850d/iframe.php',
		smilesSelector: 'https://gist.githubusercontent.com/Solvanar/12a38371eaee9ebe12a64152056c72ef/raw/f291774ddf18b8ce987b2e33a1d88a1a4aa5850d/iframe.php',
		textarea: 'https://gist.githubusercontent.com/Solvanar/12a38371eaee9ebe12a64152056c72ef/raw/f291774ddf18b8ce987b2e33a1d88a1a4aa5850d/iframe.php',
		contextMenu: 'https://gist.githubusercontent.com/Solvanar/12a38371eaee9ebe12a64152056c72ef/raw/f291774ddf18b8ce987b2e33a1d88a1a4aa5850d/iframe.php',
		navigation: 'https://gist.githubusercontent.com/Solvanar/12a38371eaee9ebe12a64152056c72ef/raw/f291774ddf18b8ce987b2e33a1d88a1a4aa5850d/iframe.php',
	};

	const placements = {
		sidebar: 'IM_SIDEBAR',
		smilesSelector: 'IM_SMILES_SELECTOR',
		textarea: 'IM_TEXTAREA',
		contextMenu: 'IM_CONTEXT_MENU',
		navigation: 'IM_NAVIGATION',
	};

	function bindSidebar()
	{
		BX24.callMethod(
			'placement.bind',
			{
				PLACEMENT: placements.sidebar,
				HANDLER: handlers.sidebar,
				LANG_ALL: {
					ru: {
						TITLE: 'Сайдбар',
					},
				},
				OPTIONS: {
					iconName: 'fa-balance-scale',
					extranet: 'N',
					context: 'ALL',
					role: 'USER',
				}
			},
			(...args) => console.log('sidebar placement', args)
		)
	}

	function bindSmilesSelector()
	{
		BX24.callMethod(
			'placement.bind',
			{
				PLACEMENT: placements.smilesSelector,
				HANDLER: handlers.smilesSelector,
				LANG_ALL: {
					ru: {
						TITLE: 'Селектор смайликов',
					},
				},
				OPTIONS: {
					extranet: 'N',
					role: 'USER',
				}
			},
			(...args) => console.log('smiles selector placement', args)
		)
	}

	function bindTextarea()
	{
		BX24.callMethod(
			'placement.bind',
			{
				PLACEMENT: placements.textarea,
				HANDLER: handlers.textarea,
				LANG_ALL: {
					ru: {
						TITLE: 'Поле ввода',
					},
				},
				OPTIONS: {
					context: 'ALL',
					color: 'GREEN',
					extranet: 'N',
					role: 'USER',
					width: 120,
					height: 120,
					iconName: 'fa-user-plus',
				}
			},
			(...args) => console.log('textarea placement', args)
		)
	}

	function bindContextMenu()
	{
		BX24.callMethod(
			'placement.bind',
			{
				PLACEMENT: placements.contextMenu,
				HANDLER: handlers.contextMenu,
				LANG_ALL: {
					ru: {
						TITLE: 'Менюшка',
					},
				},
				OPTIONS: {
					context: 'ALL',
					extranet: 'N',
					role: 'USER',
				}
			},
			(...args) => console.log('context menu placement', args)
		)
	}

	function bindNavigation()
	{
		BX24.callMethod(
			'placement.bind',
			{
				PLACEMENT: placements.navigation,
				HANDLER: handlers.navigation,
				LANG_ALL: {
					ru: {
						TITLE: 'Навигация',
					},
				},
				OPTIONS: {
					iconName: 'fa-user-plus',
					extranet: 'N',
					role: 'USER',
				}
			},
			(...args) => console.log('navigation placement', args)
		)
	}


	function unbind(placement)
	{
		BX24.callMethod(
			'placement.unbind',
			{
				PLACEMENT: placements[placement],
			},
			(...args) => console.log(`unbind ${placement}`, args)
		)
	}
	BX24.init(() => {
		console.log(BX24.placement.info());
	});
</script>
</html>

<style>
	.root {
		display: flex;
		flex-direction: row;
		min-width: 1024px;
		justify-content: flex-start;
	}
	.install {
        display: flex;
		flex-direction: column;
		justify-content: space-evenly;
		align-items: center;
		min-height: 300px;
		margin-right: 30px;
	}
    .uninstall {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
		align-items: center;
        min-height: 300px;
    }
</style>
