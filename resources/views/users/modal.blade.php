    <!-- Edit Pricing Plan Modal -->
    <div class="modal fade" id="editPricingModal" tabindex="-1" aria-labelledby="editPricingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editPricingForm" method="POST" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit-user-name" class="form-label">Name</label>
                            <input type="text" id="edit-user-name" class="form-control" disabled />
                        </div>
                        <div class="mb-3">
                            <label for="pricing-id" class="form-label">Pricing Plan</label>
                            <select name="pricing_id" id="pricing-id" class="form-select">
                                @foreach ($pricingPlans as $pricingPlan)
                                    <option value="{{ $pricingPlan->id }}">{{ $pricingPlan->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editPricingModal = document.getElementById('editPricingModal');

            // When modal is shown, update the form action
            editPricingModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const userSlug = button.getAttribute('data-user-slug'); // Retrieve the slug
                const userName = button.getAttribute('data-user-name');
                const userPricingId = button.getAttribute('data-user-pricing-id');

                // Populate modal fields
                document.getElementById('edit-user-name').value = userName;
                document.getElementById('pricing-id').value = userPricingId;

                // Set the form action with the slug
                const form = document.getElementById('editPricingForm');
                form.action =
                `/user/${userSlug}/update-pricing-plan`; // Dynamically set the route with slug
            });
        });
    </script>
