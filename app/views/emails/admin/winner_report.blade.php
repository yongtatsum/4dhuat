<!DOCTYPE html>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" style="background: #f6f6f6; color: #403e47; margin: 0; padding: 0;">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Bidoboo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <style>
            thead th {border-bottom: 1px solid #333; font-weight: bold;}
            </style>
  </head>
  <body style="background: #f6f6f6; color: #403e47; margin: 0; padding: 0;">

       <div class="content" style="border-spacing: 0; margin: 0 auto; max-width: 500px;">
                      
                        <h2 style="color: #403e47; font-size: 22px;text-align: left">[{{$phase['phase']['name']}}] {{$phase['name']}}</h2>
                         <p style="border-top: 1px dashed #dcdcdc;"></p>

                        
                        <p style="color: #403e47; font-size: 15px; ;text-align: left"><strong>Winner details</strong> </p>
                        
                        <table style="width: 100%;">
                         
                            <tbody>
                                <tr>
                                    <td>
                                        Winner name
                                    </td>
                                    <td>
                                        {{$phase['phase']['winner']['name']}}
                                    </td>
                                </tr> 
                                <tr>
                                    <td>
                                        Lucky number
                                    </td>
                                    <td>
                                        {{$phase['phase']['winner']['won_number']}}
                                    </td>
                                    </tr> 
                                <tr>
                                    <td>
                                        Announced on
                                    </td>
                                    <td>
                                        {{$phase['phase']['winner']['release_date']}}
                                    </td>
                                    </tr> 
                                <tr>
                                     <td>
                                        Total bids
                                    </td>
                                    <td>
                                        {{$phase['phase']['winner']['total_bid']}}
                                    </td>
          
                                </tr>
                            </tbody>
                        </table>
                      <p style="border-top: 1px dashed #dcdcdc;"></p>
                      
                       <p style="color: #403e47; font-size: 15px; ;text-align: left"><strong>Winner contact</strong> </p>
                        
                        <table style="width: 100%;">
                         
                            <tbody>
                                <tr>
                                    <td>
                                        Winner name
                                    </td>
                                    <td>
                                        {{$phase['phase']['winner']['name']}}
                                    </td>
                                </tr> 
                                <tr>
                                    <td>
                                        Mobile
                                    </td>
                                    <td>
                                        {{$mobile}}
                                    </td>
                                </tr> 
                                 <tr>
                                    <td>
                                        Mobile (Shipment)
                                    </td>
                                    <td>
                                        {{$shipment_mobile}}
                                    </td>
                                </tr> 
                                 <tr>
                                    <td>
                                        Email
                                    </td>
 
                                    <td>
                                        {{$email}}
                                    </td>
                                </tr> 
                                 <tr>
                                     <td>
                                        Shipping address
                                    </td>
                                    <td>
                                        {{$address}}
                                    </td>
          
                                </tr>
                            </tbody>
                        </table>
                      <p style="border-top: 1px dashed #dcdcdc;"></p>
                      
                      
                        <p style="color: #403e47; font-size: 15px; ;text-align: left"><strong>Report</strong> </p>
                      <table style="width: 100%;border-collapse: collapse; border-spacing: 0;margin-bottom: 25px">
                          <thead>
                               <tr>
                                    <th>
                                        Name
                                    </th>
                                   <th style="text-align: right;padding-right: 15px">
                                       Total bids
                                   </th>
                                    <th>
                                         Bid time
                                    </th>
                                </tr>
                          </thead>
                          <tbody>
                               @for ($i = 0; $i <= sizeof($record_array)-1; $i++)
                            <tr @if ($record_array[$i]['user']['id'] == $phase['phase']['winner']['id']) style="background:yellow" @endif>
                                    <td>
                                        {{$record_array[$i]['user']['name']}} 
                                    </td>
                                    <td style="text-align: right;padding-right : 15px">
                                        {{$record_array[$i]['joined_times']}}
                                    </td>
                                    <td>
                                        {{$record_array[$i]['created_on']}}
                                    </td>
                                </tr>
                        @endfor
                          </tbody>
                         
                      </table>
                     
                      
       </div>
  </body>
</html>