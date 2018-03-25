<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 25.03.2018
 * Time: 11:37
 */

function get_default_modal_form(){
?>

	<div class="modal fade modal-default js-modal-default"  tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
				</div>
				<div class="modal-body js-modal-body">
					<div class="row">
						<div class="col-md-12 modal-message js-modal-message"></div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-modal-close js-modal-close" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<?php
}