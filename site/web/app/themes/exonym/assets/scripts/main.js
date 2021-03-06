require('jquery-visible');
require('slick-carousel');

jQuery(document).ready(() => {
	// Wrap embedded objects and force them into 16:9
	$('#container iframe, #container embed, #container video').not('.ignore-ratio').wrap('<div class="video-container" />');

	// HEADER: Responsive Nav Toggle
	$('#responsive-nav-toggle').click(e => {
		e.preventDefault();
		const $this = $(e.currentTarget);
		$this.toggleClass('is-active');
		$('#nav-responsive').toggleClass('is-active');
	});

	// HEADER: Slideshow
	$('.module-slider').slick({
		arrows: false,
	});

	// MODULES: Parallax
	$(window).on('load resize scroll', () => {
		const d_scroll = $(window).scrollTop();
		const w_height = $(window).height();
		$('.animate-parallax').each((i, e) => {
			const $this = $(e);
			const $thisBg = $this.find('.module-bg');
			const p_position = $this.offset().top;
			const e_height = $this.outerHeight();
			const ebg_height = $this.find('.module-bg').outerHeight();
			const bg_diff = ebg_height - e_height;
			const dhit_in = p_position - w_height;
			const dhit_out = p_position + e_height;
			const dhit_read = p_position - w_height - d_scroll;
			// Boolean hit Check
			if (dhit_read <= 0 && d_scroll <= dhit_out) {
				const per_scrolled = (d_scroll - dhit_in) / (dhit_out - dhit_in);
				const offset = (bg_diff * per_scrolled);
				$thisBg.css('transform', `translateY(-${offset}px)`);
			}
		});
	});

	// MODULES: Animate onScreen
	$(window).on('load resize scroll', () => {
		$('.animate-on-enter').each((i, el) => {
			const $this = $(el);
			if ($this.visible(true)) {
				$this.addClass('is-visible');
			}
		});
		$('.animate-on-leave').each((i, el) => {
			const $this = $(el);
			if (!$this.visible(true)) {
				$this.removeClass('is-visible');
			}
		});
	});

	// MODULE - Search: Select Active on Load
	const catTarget = $('#cat-target').data('cat');
	$(`#cat-${catTarget}`).addClass('is-active');
	$('#cat-hidden').val(catTarget);

	// MODULE - Search: Category Browse Submit
	$('.search-form-cat').on('click', e => {
		e.preventDefault();
		const $this = $(e.currentTarget);
		if($this.hasClass('is-active')) {
			$('#cat-hidden').val('');
			$('#search-form').submit();
		} else {
			const target = $this.attr('id');
			$('#cat-hidden').val(target.substring(4));
			$('#search-form').submit();
		}
	});
});
