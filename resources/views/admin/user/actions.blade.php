<div class="tab-pane fade" id="action" role="tabpanel" aria-labelledby="action-tab">
	<div class="card text-dark">
		<div class="card-body">
			<form action="{{ route('action', $user->id) }}" method="post">
				@csrf
				<label class="h6">
					@if ($user->account_status == "blocked")
					This account has been blocked
					@else
					Account is active
					@endif
				</label>
				<div class="form-group">
					<textarea name="message" rows="6" class="form-control"
						placeholder="Enter a message to be sent to the user for any of the actions below"></textarea>
				</div>

				@if ($user->account_status == "blocked")
				<button name="action" value="unlock" type="submit" class="btn btn-sm btn-success">Unblock
					account</button>
				@else
				<button name="action" value="lock" type="submit" class="btn btn-sm btn-dark"> Block account</button>
				@endif
				<button name="action" value="delete" type="submit" class="btn btn-sm btn-danger">Delete account</button>
			</form>
		</div>
	</div>
</div>
