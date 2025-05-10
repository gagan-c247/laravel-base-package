// Loader Show
// window.onload = function () {
//     console.log("Loader Show");
//     const loader = document.querySelector(".loading-effect");
//     console.log(loader);
//     if (loader) {
//         setTimeout(() => {
//             loader.style.opacity = 0;
//             setTimeout(() => {
//                 loader.style.display = "none";
//                 document.body.style.overflow = "";
//             }, 500);
//         }, 2000);
//     }
// };
$(document).ready(function () {
    // Loader Hide
    const loader = document.querySelector(".loading-effect");
    if (loader) {
        setTimeout(() => {
            loader.style.opacity = 0;
            setTimeout(() => {
                loader.style.display = "none";
                document.body.style.overflow = "";
            }, 500);
        }, 1000);
    }
});
/*
  Reference: http://jsfiddle.net/BB3JK/47/
  */

$(".single-select").each(function () {
    var $this = $(this),
        numberOfOptions = $this.children("option").length;

    $this.addClass("select-hidden");
    $this.wrap('<div class="single-select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next("div.select-styled");
    $styledSelect.text($this.children("option").eq(0).text());

    var $list = $("<ul />", { class: "select-options" }).insertAfter(
        $styledSelect
    );
    var $searchInput = $(
        '<input type="text" class="form-control" placeholder="Search..." />'
    ).appendTo($list);

    for (var i = 0; i < numberOfOptions; i++) {
        $("<li />", {
            text: $this.children("option").eq(i).text(),
            rel: $this.children("option").eq(i).val(),
        }).appendTo($list);

        if ($this.children("option").eq(i).is(":selected")) {
            $(
                'li[rel="' + $this.children("option").eq(i).val() + '"]'
            ).addClass("is-selected");
        }
    }
    $searchInput.on("click", function (e) {
        e.stopPropagation(); // Prevent dropdown from closing when clicking on search input
    });
    $searchInput.on("keyup", function () {
        var filter = $(this).val().toLowerCase();
        $listItems.each(function () {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.indexOf(filter) > -1);
        });
    });

    var $listItems = $list.children("li");

    $styledSelect.click(function (e) {
        e.stopPropagation();
        $("div.select-styled.active")
            .not(this)
            .each(function () {
                $(this).removeClass("active").next("ul.select-options").hide();
            });
        $(this).toggleClass("active").next("ul.select-options").toggle();
    });

    $searchInput.on("click", function (e) {
        e.stopPropagation(); // Prevent dropdown from closing when clicking on search input
    });

    $searchInput.on("keyup", function () {
        var filter = $(this).val().toLowerCase();
        $listItems.each(function () {
            var text = $(this).text().toLowerCase();
            $(this).toggle(text.indexOf(filter) > -1);
        });
    });

    $listItems.click(function (e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass("active");
        $this.val($(this).attr("rel"));
        $list.find("li.is-selected").removeClass("is-selected");
        $list
            .find('li[rel="' + $(this).attr("rel") + '"]')
            .addClass("is-selected");
        $list.hide();
    });

    $(document).click(function () {
        $styledSelect.removeClass("active");
        $list.hide();
    });
});
//csrf setup
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const sidebarLinks = document.querySelectorAll(
        ".sidebar-item > .sidebar-link"
    );

    sidebarLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            // Toggle active class on the clicked link
            link.classList.toggle("active");

            // Find the first-level ul associated with the link
            const firstLevelMenu = link.nextElementSibling;

            if (
                firstLevelMenu &&
                firstLevelMenu.classList.contains("first-level")
            ) {
                // Toggle 'in' class on the first-level ul
                firstLevelMenu.classList.toggle("in");

                // Close other first-level menus if necessary
                sidebarLinks.forEach((otherLink) => {
                    if (otherLink !== link) {
                        otherLink.classList.remove("active");
                        const otherMenu = otherLink.nextElementSibling;
                        if (
                            otherMenu &&
                            otherMenu.classList.contains("first-level")
                        ) {
                            otherMenu.classList.remove("in");
                        }
                    }
                });
            }
        });
    });
});
const sidebarToggler = document.querySelector(".sidebartoggler");
const sidebar = document.querySelector(".left-sidebar");
const wrapper = document.querySelector(".body-wrapper");
const icon = document.querySelector("#toggleIcon");

if (sidebarToggler) {
    // Check the localStorage for saved state
    const sidebarState = localStorage.getItem("sidebarState");

    if (sidebarState === "collapsed") {
        sidebar.classList.add("collapsed");
        wrapper.classList.add("sidebar-close");
        if (icon && !icon.src.includes("toggle-icon-open.svg")) {
            icon.src = "/admin/images/toggle-icon-close.svg";
        }
    } else if (sidebarState === "expanded") {
        sidebar.classList.remove("collapsed");
        wrapper.classList.remove("sidebar-close");
        if (icon && icon.src.includes("toggle-icon-close.svg")) {
            icon.src = "/admin/images/toggle-icon-open.svg";
        }
    }

    sidebarToggler.addEventListener("click", function () {
        // Toggle the sidebar state
        if (icon) {
            if (icon.src.includes("toggle-icon-open.svg")) {
                icon.src = "/admin/images/toggle-icon-close.svg";
            } else {
                icon.src = "/admin/images/toggle-icon-open.svg";
            }
        }

        if (window.innerWidth > 768) {
            // Toggle collapsed class for desktop
            sidebar.classList.toggle("collapsed");
            wrapper.classList.toggle("sidebar-close");

            // Save the current state to localStorage
            if (sidebar.classList.contains("collapsed")) {
                localStorage.setItem("sidebarState", "collapsed");
            } else {
                localStorage.setItem("sidebarState", "expanded");
            }
        } else {
            // Show sidebar for mobile
            sidebar.classList.toggle("show");
        }
    });
}
// const sidebarToggler = document.querySelector(".sidebartoggler");

// if (sidebarToggler) {
//     sidebarToggler.addEventListener("click", function () {
//         const icon = document.querySelector("#toggleIcon");
//         const sidebar = document.querySelector(".left-sidebar");
//         const wrapper = document.querySelector(".body-wrapper");

//         if (icon) {
//             // Check the current image source and toggle it
//             if (icon.src.includes("toggle-icon-open.svg")) {
//                 icon.src = "/admin/images/toggle-icon-close.svg"; // Set to the 'close' icon
//             } else {
//                 icon.src = "/admin/images/toggle-icon-open.svg"; // Set to the 'open' icon
//             }
//         }

//         if (window.innerWidth > 768) {
//             // Toggle collapsed class for desktop
//             sidebar.classList.toggle("collapsed");
//             wrapper.classList.toggle("sidebar-close");
//         } else {
//             // Show sidebar for mobile
//             sidebar.classList.toggle("show");
//         }
//     });
// }
// document.addEventListener("DOMContentLoaded", function () {
//     const phoneInput = document.querySelector("#phone");
//     // Initialize the library
//     if (phoneInput) {
//         window.intlTelInput(phoneInput, {
//             initialCountry: "us",
//             separateDialCode: true,
//             preferredCountries: ["us", "gb", "in"],
//             utilsScript: "/admin/assets/js/utils.js",
//         });
//     }
// });

// Image upload js

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            const imagePreview = document.getElementById("imagePreview");
            imagePreview.style.backgroundImage = `url(${e.target.result})`;
            imagePreview.style.display = "none";
            setTimeout(() => {
                imagePreview.style.display = "block";
                imagePreview.style.opacity = 1; // Simulate fade-in effect
            }, 0);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

const imageUploadInput = document.getElementById("profileUpload");
const dropZone = document.getElementById("dropZone");

// Handle file input change
if (imageUploadInput) {
    imageUploadInput.addEventListener("change", function () {
        // Create a FormData object
        var formData = new FormData();
        var file = this.files[0];
        var maxSize = 2 * 1024 * 1024;
        if (file.size > maxSize) {
            toastr.error("File size exceeds 2MB limit", "Error", {
                iconClass: "error",
            });
            return;
        }

        formData.append("profile_picture", file);

        jQuery.ajax({
            url: "/admin/update-profile-picture",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                readURL(imageUploadInput);
                setTimeout(() => {
                    const imagePreviewStyle =
                        $("#imagePreview").css("background-image");
                    if (imagePreviewStyle && imagePreviewStyle !== "none") {
                        // Extract URL from background-image property (removes 'url(' and ')')
                        const url = imagePreviewStyle
                            .replace(/^url\(['"]?/, "")
                            .replace(/['"]?\)$/, "");

                        $(".img-profile").removeAttr("src"); // Remove any existing src
                        $(".img-profile").attr("src", url); // Set the src with the extracted image URL
                    }
                }, 500);
                toastr.success("Profile image uploaded", "Success", {
                    iconClass: "success",
                });
                $(".profile-delete").attr(
                    "style",
                    "display: block !important;"
                );
            },
            error: function (error) {
                toastr.clear();
                toastr.error(
                    error.responseJSON.errors.profile_picture[0],
                    "Error",
                    {
                        iconClass: "error",
                    }
                );
            },
        });
    });
}

// Handle drag-and-drop
if (dropZone) {
    dropZone.addEventListener("dragover", function (e) {
        e.preventDefault();
        dropZone.classList.add("drag-over");
    });

    dropZone.addEventListener("dragleave", function () {
        dropZone.classList.remove("drag-over");
    });

    dropZone.addEventListener("drop", function (e) {
        e.preventDefault();
        dropZone.classList.remove("drag-over");

        const files = e.dataTransfer.files;
        if (files && files[0]) {
            imageUploadInput.files = files; // Assign the dropped files to the input element
            readURL(imageUploadInput);
        }
    });

    // Reset the preview image on delete-avatar span click
    document.addEventListener("DOMContentLoaded", function () {
        const deleteAvatarSpan = document.querySelector(
            ".delete-avatar.profile-delete span"
        );
        if (deleteAvatarSpan) {
            deleteAvatarSpan.addEventListener("click", function () {
                const imagePreview = document.getElementById("imagePreview");
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/delete-profile-picture",
                            type: "POST",
                            success: function (response) {
                                imagePreview.style.backgroundImage = `url('/admin/images/user-profile.jpg')`; // Reset to the default image
                                $(".img-profile").attr(
                                    "src",
                                    "/admin/images/user-profile.jpg"
                                );
                                imageUploadInput.value = "";
                                // Clear the file input
                                toastr.success(
                                    "Profile image deleted",
                                    "Success",
                                    {
                                        iconClass: "success",
                                    }
                                );
                                $(".profile-delete").hide();
                            },
                            error: function (error) {
                                toastr.error(
                                    "Failed to delete",
                                    "Error toaster",
                                    {
                                        iconClass: "error",
                                    }
                                );
                            },
                        });
                    }
                });
            });
        }
    });
}

// Toaster-Messages

/*

toastr.success("A simple success toaster design", "Success", {
  iconClass: 'success'
});

toastr.error("A simple Error toaster design", "Error toaster", {
  iconClass: 'error'
});

toastr.warning("A simple Error toaster design", "warning toaster", {
  iconClass: 'warning'
});

toastr.info("A simple Error toaster design", "Info toaster", {
  iconClass: 'info'
});

*/

$(document).ready(function () {
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: false,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        showDuration: "300",
        hideDuration: "1000",
        timeOut: "2000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    $(document).ready(function () {
        $(".js-select2").each(function () {
            $(this).select2({
                closeOnSelect: true,
                placeholder: "Select an option",
                dropdownParent: $(this).parent(),
                minimumResultsForSearch: 5,
            });
        });

        // Set placeholder dynamically when no options are selected
        $(".js-select2").on("change", function () {
            let searchInput = $(".select2-search__field");
            searchInput.attr("placeholder", "Type to search...");
        });

        // Handle placeholder for search input inside dropdown when opened
        $(".js-select2").on("select2:open", function () {
            let searchInput = $(
                ".select2-container--open .select2-search__field"
            );
            searchInput.attr("placeholder", "Type to search...");
        });

        $("#datepicker").datepicker();
    });
    $(document).on("focus", "input", function () {
        $(this).closest(".field").find(".server-error").hide();
    });
});

// gautam

function togglePasswordVisibility(event) {
    console.log("togglePasswordVisibility called");
    const toggleIcon = event.target.closest(".password-toggle-icon"); // Get the clicked toggle icon
    const wrapper = toggleIcon.closest(".field"); // Assuming a wrapper around the field
    const passwordInput = wrapper.querySelector(
        'input[type="password"], input[type="text"]'
    ); // Find the input field within the wrapper

    if (passwordInput) {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon
                .querySelector(".iconify")
                .setAttribute("data-icon", "mdi:eye");
        } else {
            passwordInput.type = "password";
            toggleIcon
                .querySelector(".iconify")
                .setAttribute("data-icon", "mdi:eye-off");
        }
    }
}
function passwordToggle() {
    document.querySelectorAll(".password-toggle-icon").forEach((toggleIcon) => {
        toggleIcon.addEventListener("click", togglePasswordVisibility);
    });
}
passwordToggle();

function jsReintialize(event) {}
