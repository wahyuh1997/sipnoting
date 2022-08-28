<div class="modal-header">
  <h4 class="modal-title">Booking Table</h4>
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body">
  <!-- Form Submit Order -->
  <div class="mb-3">
    <label for="customerId" class="form-label">Select Your Name</label>
    <div class="row">
      <div class="col-9 pe-0">
        <select class="form-select teatimeSelect" id="customerId" name="customerId" data-url="<?= base_url('select_serverside/getData?url=v1/customers/select2'); ?>">
          <option value="">Select Option</option>
        </select>
      </div>
      <div class="col-3 d-grid gap-2">
        <button type="button" class="btn btn-sm btn-primary" onclick="window.open('<?= base_url('customer/add') ?>', 'chromeWindow', 'popup');">Add New</button>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="customerId" class="form-label">Book Date</label>
    <div class="input-group date" id="datepicker-disabled-past" data-date-format="yyyy-mm-dd" data-date-start-date="Date.default">
      <input type="text" class="form-control" placeholder="Select Date" value="<?= date('Y-m-d'); ?>" />
      <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <div class="mb-3">
        <label for="tableBookStartTime" class="form-label">Start Time</label>
        <div class="input-group bootstrap-timepicker">
          <input id="tableBookStartTime" name="tableBookStartTime" type="text" class="form-control timepicker-default" />
          <span class="input-group-text input-group-addon">
            <i class="fa fa-clock"></i>
          </span>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="mb-3">
        <label for="tableBookEndTime" class="form-label">End Time</label>
        <div class="input-group bootstrap-timepicker">
          <input id="tableBookEndTime" name="tableBookEndTime" type="text" class="form-control timepicker-default" value="<?= date('H:i', strtotime(' + 1 hours')); ?>" readonly />
          <!-- <span class="input-group-text input-group-addon">
            <i class="fa fa-clock"></i>
          </span> -->
        </div>
      </div>
    </div>
  </div>
  <div class="mb-3">
    <label for="tableBookComment" class="form-label">Comment</label>
    <textarea name="tableBookComment" id="tableBookComment" cols="30" rows="3" class="form-control"></textarea>
  </div>
  <!-- End Of Form Submit Order -->
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
  <button type="button" class="btn btn-success btn-create-order" data-bs-dismiss="modal">Submit</button>
</div>