<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>{{ $title }}</title>
</head>
<body>
  <h1>{{ $heading}}</h1>
  <h3>{{"Médico Responsável: ".$collaborator_name}}</h3>
  
  <table width="100%" style="width:100%" border="0">
      <tr>
        <td><p>{{$medicine_name}}</p></td>
        <td>............................................</td>
      <td><p>{{$receipt_quantity}}</p></td>
        <td><p>{{$receipt_period}}</p></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      <td><img src="{{public_path('storage/'.$collaborator_signature)}}" style="width:40px;height:40px;"/></td>
      </tr>
      <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
      <td>{{$collaborator_name}}</td>
      </tr>
    </table>
</body>
</body>
</html>