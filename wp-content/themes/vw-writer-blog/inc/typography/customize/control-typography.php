<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Writer_Blog_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-writer-blog' ),
				'family'      => esc_html__( 'Font Family', 'vw-writer-blog' ),
				'size'        => esc_html__( 'Font Size',   'vw-writer-blog' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-writer-blog' ),
				'style'       => esc_html__( 'Font Style',  'vw-writer-blog' ),
				'line_height' => esc_html__( 'Line Height', 'vw-writer-blog' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-writer-blog' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-writer-blog-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-writer-blog-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-writer-blog' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-writer-blog' ),
        'Acme' => __( 'Acme', 'vw-writer-blog' ),
        'Anton' => __( 'Anton', 'vw-writer-blog' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-writer-blog' ),
        'Arimo' => __( 'Arimo', 'vw-writer-blog' ),
        'Arsenal' => __( 'Arsenal', 'vw-writer-blog' ),
        'Arvo' => __( 'Arvo', 'vw-writer-blog' ),
        'Alegreya' => __( 'Alegreya', 'vw-writer-blog' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-writer-blog' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-writer-blog' ),
        'Bangers' => __( 'Bangers', 'vw-writer-blog' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-writer-blog' ),
        'Bad Script' => __( 'Bad Script', 'vw-writer-blog' ),
        'Bitter' => __( 'Bitter', 'vw-writer-blog' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-writer-blog' ),
        'BenchNine' => __( 'BenchNine', 'vw-writer-blog' ),
        'Cabin' => __( 'Cabin', 'vw-writer-blog' ),
        'Cardo' => __( 'Cardo', 'vw-writer-blog' ),
        'Courgette' => __( 'Courgette', 'vw-writer-blog' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-writer-blog' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-writer-blog' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-writer-blog' ),
        'Cuprum' => __( 'Cuprum', 'vw-writer-blog' ),
        'Cookie' => __( 'Cookie', 'vw-writer-blog' ),
        'Chewy' => __( 'Chewy', 'vw-writer-blog' ),
        'Days One' => __( 'Days One', 'vw-writer-blog' ),
        'Dosis' => __( 'Dosis', 'vw-writer-blog' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-writer-blog' ),
        'Economica' => __( 'Economica', 'vw-writer-blog' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-writer-blog' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-writer-blog' ),
        'Francois One' => __( 'Francois One', 'vw-writer-blog' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-writer-blog' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-writer-blog' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-writer-blog' ),
        'Handlee' => __( 'Handlee', 'vw-writer-blog' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-writer-blog' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-writer-blog' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-writer-blog' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-writer-blog' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-writer-blog' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-writer-blog' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-writer-blog' ),
        'Kanit' => __( 'Kanit', 'vw-writer-blog' ),
        'Lobster' => __( 'Lobster', 'vw-writer-blog' ),
        'Lato' => __( 'Lato', 'vw-writer-blog' ),
        'Lora' => __( 'Lora', 'vw-writer-blog' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-writer-blog' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-writer-blog' ),
        'Merriweather' => __( 'Merriweather', 'vw-writer-blog' ),
        'Monda' => __( 'Monda', 'vw-writer-blog' ),
        'Montserrat' => __( 'Montserrat', 'vw-writer-blog' ),
        'Muli' => __( 'Muli', 'vw-writer-blog' ),
        'Marck Script' => __( 'Marck Script', 'vw-writer-blog' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-writer-blog' ),
        'Open Sans' => __( 'Open Sans', 'vw-writer-blog' ),
        'Overpass' => __( 'Overpass', 'vw-writer-blog' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-writer-blog' ),
        'Oxygen' => __( 'Oxygen', 'vw-writer-blog' ),
        'Orbitron' => __( 'Orbitron', 'vw-writer-blog' ),
        'Patua One' => __( 'Patua One', 'vw-writer-blog' ),
        'Pacifico' => __( 'Pacifico', 'vw-writer-blog' ),
        'Padauk' => __( 'Padauk', 'vw-writer-blog' ),
        'Playball' => __( 'Playball', 'vw-writer-blog' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-writer-blog' ),
        'PT Sans' => __( 'PT Sans', 'vw-writer-blog' ),
        'Philosopher' => __( 'Philosopher', 'vw-writer-blog' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-writer-blog' ),
        'Poiret One' => __( 'Poiret One', 'vw-writer-blog' ),
        'Quicksand' => __( 'Quicksand', 'vw-writer-blog' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-writer-blog' ),
        'Raleway' => __( 'Raleway', 'vw-writer-blog' ),
        'Rubik' => __( 'Rubik', 'vw-writer-blog' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-writer-blog' ),
        'Russo One' => __( 'Russo One', 'vw-writer-blog' ),
        'Righteous' => __( 'Righteous', 'vw-writer-blog' ),
        'Slabo' => __( 'Slabo', 'vw-writer-blog' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-writer-blog' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-writer-blog'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-writer-blog' ),
        'Sacramento' => __( 'Sacramento', 'vw-writer-blog' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-writer-blog' ),
        'Tangerine' => __( 'Tangerine', 'vw-writer-blog' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-writer-blog' ),
        'VT323' => __( 'VT323', 'vw-writer-blog' ),
        'Varela Round' => __( 'Varela Round', 'vw-writer-blog' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-writer-blog' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-writer-blog' ),
        'Volkhov' => __( 'Volkhov', 'vw-writer-blog' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-writer-blog' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-writer-blog' ),
			'100' => esc_html__( 'Thin',       'vw-writer-blog' ),
			'300' => esc_html__( 'Light',      'vw-writer-blog' ),
			'400' => esc_html__( 'Normal',     'vw-writer-blog' ),
			'500' => esc_html__( 'Medium',     'vw-writer-blog' ),
			'700' => esc_html__( 'Bold',       'vw-writer-blog' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-writer-blog' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-writer-blog' ),
			'italic'  => esc_html__( 'Italic', 'vw-writer-blog' ),
			'oblique' => esc_html__( 'Oblique', 'vw-writer-blog' )
		);
	}
}
