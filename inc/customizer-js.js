(function($) {
	wp.customize.bind('ready', function() {
		const settingId = 'undercustoms_slider_repeater';
		const control = $('#customize-control-' + settingId);
		const wrapper = $('<div class="custom-slider-repeater"></div>');
		const addButton = $('<button type="button" class="button">Add New Slide</button>');

		control.append(wrapper).append(addButton);

		function getSlides() {
			try {
				return JSON.parse(wp.customize(settingId).get()) || [];
			} catch (e) {
				return [];
			}
		}

		function saveSlides(slides) {
			wp.customize(settingId).set(JSON.stringify(slides));
		}

		function renderSlides() {
			const slides = getSlides();
			wrapper.empty();

			slides.forEach((slide, index) => {
				const slideBox = $('<div class="slide-box" style="margin-bottom:20px;border:1px solid #ccc;padding:10px;"></div>');

				slideBox.append(`<strong>Slide ${index + 1}</strong><br><br>`);

				const imagePreview = $(`<img src="${slide.image || ''}" style="max-width: 100%; display: ${slide.image ? 'block' : 'none'}; margin-bottom: 10px;">`);
				const imageButton = $('<button type="button" class="button">Select Image</button>');

				const captionInput = $('<textarea class="widefat" placeholder="Caption"></textarea>').val(slide.caption);
				const removeBtn = $('<button type="button" class="button">Remove</button>');

				imageButton.on('click', function(e) {
					e.preventDefault();
					const media = wp.media({
						title: 'Select or Upload Image',
						button: { text: 'Use this image' },
						multiple: false
					});

					media.on('select', function() {
						const attachment = media.state().get('selection').first().toJSON();
						slide.image = attachment.url;
						imagePreview.attr('src', attachment.url).show();
						saveSlides(slides);
					});

					media.open();
				});

				captionInput.on('input', () => {
					slide.caption = captionInput.val();
					saveSlides(slides);
				});

				removeBtn.on('click', () => {
					slides.splice(index, 1);
					saveSlides(slides);
					renderSlides();
				});

				slideBox.append(imagePreview, imageButton, '<br><br>', captionInput, '<br><br>', removeBtn);
				wrapper.append(slideBox);
			});
		}

		addButton.on('click', function() {
			const slides = getSlides();
			slides.push({ image: '', caption: '' });
			saveSlides(slides);
			renderSlides();
		});

		renderSlides();
	});
})(jQuery);
