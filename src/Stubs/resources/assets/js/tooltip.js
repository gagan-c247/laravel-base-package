function initializeTooltip(element) {
    try {
        // Check if the tooltip instance exists
        let tooltipInstance = bootstrap.Tooltip.getInstance(element);

        // If no instance exists, initialize it
        if (!tooltipInstance) {
            tooltipInstance = new bootstrap.Tooltip(element, {
                container: "body", // Prevent clipping issues
            });
        }
    } catch (error) {
        console.error("Error initializing tooltip:", error);
    }
}

// Safely dispose of a tooltip instance for the specified element
function disposeTooltip(element) {
    try {
        const tooltipInstance = bootstrap.Tooltip.getInstance(element);
        if (tooltipInstance) {
            tooltipInstance.dispose(); // Dispose tooltip instance safely
        }
    } catch (error) {
        console.error("Error disposing tooltip:", error);
    }
}

// Handle hover to initialize tooltips
document.addEventListener("mouseover", (event) => {
    const target = event.target.closest('[data-bs-toggle="tooltip"]');
    if (target) {
        initializeTooltip(target);
    }
});

// Dispose tooltips safely when clicking outside
document.addEventListener("click", (event) => {
    const clickedElement = event.target.closest('[data-bs-toggle="tooltip"]');
    document
        .querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach((element) => {
            if (element !== clickedElement) {
                disposeTooltip(element);
            }
        });
});

// Modal-specific tooltip handling
document.querySelectorAll(".modal").forEach((modal) => {
    modal.addEventListener("shown.bs.modal", () => {
        modal
            .querySelectorAll('[data-bs-toggle="tooltip"]')
            .forEach((element) => {
                initializeTooltip(element);
            });
    });

    modal.addEventListener("hidden.bs.modal", () => {
        modal
            .querySelectorAll('[data-bs-toggle="tooltip"]')
            .forEach((element) => {
                disposeTooltip(element);
            });
    });
});

// Pre-initialize tooltips for all elements on DOM ready (optional)
document.addEventListener("DOMContentLoaded", () => {
    document
        .querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach((element) => {
            initializeTooltip(element);
        });
});
