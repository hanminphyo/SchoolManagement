document.addEventListener("DOMContentLoaded", function () {
    function setupDeleteModal(entity) {
        const modal = document.getElementById(`${entity}Modal`);
        if (!modal) return;
        modal.addEventListener("show.bs.modal", function (event) {
            const button = event.relatedTarget;
            const entityId = button.getAttribute(`data-${entity}-id`);
            const deleteForm = document.getElementById(`${entity}Form`);
            if (deleteForm) {
                deleteForm.action = `/${entity}s/${entityId}`;
            }
        });
    }
    ["student", "course", "teacher", "group"].forEach(setupDeleteModal);
});
