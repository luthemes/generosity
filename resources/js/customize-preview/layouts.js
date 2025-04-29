let layouts = Object.values( generosityCustomizePreview.globalLayouts ).map( layout => layout.name );

wp.customize( 'theme_content_layout', value => {
	value.bind( to => {
		let container = document.getElementById( 'global-layout' );

		if ( ! container ) return;

		// Remove all layout classes.
		container.classList.remove( ...layouts );

		// Add new layout class.
		container.classList.add( to );
	} );
} );
