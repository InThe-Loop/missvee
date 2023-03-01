/**
 * Catalogue
 */

// Product search
$("#search-form").on("submit", function (e) {
	e.preventDefault();
	var query = $("#search-form input").val().toLowerCase();
    $("#search-form input").val("");

	$(".product.searchable").hide();
	$(".product.searchable").each(function () {
		var title = $(this).data("title"),
			fabric = $(this).data("fabric"),
			color = $(this).data("color"),
			category = $(this).data("category"),
			price = $(this).data("price");

		if (title === query ||
			fabric === query ||
			color === query ||
			category === query ||
			price === query)
        {
			// TO DO: search by title/name not working!
			$(this).show();
		}
	});
});

// Toggle advanced filters
$(".advanced-filters").on("click", function() {
	$('#filter').slideToggle();
});

// On filter change
var filtersObject = {};
$(".filter").on("change", function () {
	var filterName = $(this).data("filter"),
		filterVal = $(this).val();

	if (filterVal == "") {
		delete filtersObject[filterName];
	}
    else {
		filtersObject[filterName] = filterVal;
	}

	var filters = "";
	for (var key in filtersObject) {
		if (filtersObject.hasOwnProperty(key)) {
			filters += "[data-" + key + "='" + filtersObject[key] + "']";
		}
	}

	if (filters == "") {
		$(".product.searchable").show();
	}
    else {
		$(".product.searchable").hide();
		$(".product.searchable").hide().filter(filters).show();
	}
});

$(function () {
    $("#slider-range").slider({
      range: true,
      min: 500,
      max: 10000,
      step: 500,
      values: [500, 10000],
      slide: function (event, ui) {
        $("#amount").text("R" + ui.values[0] + " - R" + ui.values[1]);

        $(".product.searchable").hide();
        $(".product.searchable").each(function () {
            price = $(this).data("price");
            if (price >= ui.values[0] && price <= ui.values[1]) {
                $(this).show();
            }
        });
        
      }
    });
    $("#amount").text(
      "R" +
        $("#slider-range").slider("values", 0) +
        " - R" +
        $("#slider-range").slider("values", 1)
    );
});

$(".sort").on("change", function () {
    let sorter = $(this).val();
    var sorted_items, getSorted = function(selector, attrName) {
        return $(
            $(selector).toArray().sort(function(a, b) {
                var aVal = parseInt(a.getAttribute(attrName)),
                    bVal = parseInt(b.getAttribute(attrName));
                if (sorter == "asc") {
                    return aVal - bVal;
                }
                else if (sorter == "desc") {
                    return bVal - aVal;
                }
            })
        );
    };
    sorted_items = getSorted('.product.searchable', 'data-price');
	$('#products, #hire-products').html();
    $('#products, #hire-products').html(sorted_items);
});

// Product details
if (window.location.href.indexOf("shop") != -1) {
	$(function() {
		const imgs = document.querySelectorAll('.img-select a');
		const imgBtns = [...imgs];
		let imgId = 1;
		imgBtns.forEach((imgItem) => {
			imgItem.addEventListener('click', (event) => {
				event.preventDefault();
				imgId = imgItem.dataset.id;
				slideImage();
			});
		});

		function slideImage(){
			const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
			document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
		}
		window.addEventListener('resize', slideImage);
	});
}
