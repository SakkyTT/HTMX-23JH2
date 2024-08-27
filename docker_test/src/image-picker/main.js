function showConfirmationModal(){
    // lisätään dialog/modal HTML koodi
    const confirmationModal = `
        <dialog class="modal">
            <div id="confirmation">
                <h2>Are you Sure?</h2>
                <p>Do you really want to ACTION this picture?</p>
                <div id="confirmation-actions">
                    <button id="action-no" class="button-text">No</button>
                    <button id="action-yes" class="button">Yes</button>
                </div>
            </div>
        </dialog>
    `;
}