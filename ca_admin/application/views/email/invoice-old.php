<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SewakCabs Invoice details</title>
</head>

<body>
	<div>
		<table style="width:100%;border-spacing:0" cellpadding="0" cellspacing="0">
			<tbody>
				<tr>
					<th style="background:#f5f5f1;height:28px"></th>
				</tr>
				<tr>
					<th style="background:#f5f5f1;font-weight:normal;text-align:left">
						<table style="width:100%;max-width:596px;border-spacing:0;margin:0 auto" cellpadding="0" cellspacing="0" align="center">
							<tbody>
								<tr>
									<td>
										<table style="margin:0%;width:100%;border-spacing:0;table-layout:fixed" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td style="padding:0 3.358%;font-size:15px;color:#555;line-height:24px">
														<div style="min-height:28px"></div>
														<div style="padding:24px 3.6% 24px;background:#fff;border:1px solid #e3e5e1">
															<table cellpadding="0" cellspacing="0" style="width:100%;margin:0;padding:0">
																<tbody>
																	<tr>
																		<th><strong>Transaction Id:</strong></th>
																		<td><?=$data[0]->transaction_id?></td>
																	</tr>
																	<tr>
																		<th><strong>Transaction Status:</strong></th>
																		<td><?=$data[0]->status?></td>
																	</tr>
																	<tr>
																		<th><strong>Amount:</strong></th>
																		<td><?php
																		if($data[0]->amount_type == 'min')
																		{
																			echo $data[0]->min_paid_amount;
																		}
																		else{
																			echo $data[0]->total;
																		}?>/-</td>
																	</tr>

																	<tr>
																		<th><strong>Date & Time:</strong></th>
																		<td><?=$data[0]->created_at?>
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</th>
				</tr>
				<tr>
					<th style="background:#f5f5f1;height:28px"></th>
				</tr>
				<tr>
					<th style="background:#f5f5f1;height:28px"></th>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>