<div class="modal-header">
  <h4 class="modal-title">{{Create New Order}}</h4>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body">
  <!-- Form Submit Order -->
  <div class="mb-3">
    <label for="" class="form-label">{{Order Type}}</label>
    <select class="form-select myselect2" id="orderType" name="orderType">
      <option value="dineIn">{{Dine In}}</option>
      <option value="takeAway">{{Take Away}}</option>
    </select>
  </div>
  <div class="mb-3 location-form">
    <label for="" class="form-label">{{Location}}</label>
    <select class="form-select teatimeSelect" id="locationId" name="locationId" data-url="<?= base_url('select_serverside/getData?url=v1/locations/select2'); ?>">
      <option value="">Select Option</option>
    </select>
  </div>
  <div class="mb-3 tables-form">
    <label for="" class="form-label">{{Tables}}</label>
    <select class="form-select teatimeSelect" id="tableId">
      <option value="">Select Option</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="orderPeople" class="form-label">{{Number Of Visitors}}</label>
    <input type="number" class="form-control" name="orderPeople" id="orderPeople" value="1" min="1">
  </div>
  <!-- End Of Form Submit Order -->
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-white" data-bs-dismiss="modal">{{Close}}</button>
  <button type="button" class="btn btn-success btn-create-order" data-bs-dismiss="modal">{{Submit}}</button>
</div>