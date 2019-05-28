<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Receita</title>
</head>
<body>
  <h1>{{ "Clínica: ".$receipt->collaborator->clinic->name }}</h1>
  <h3>{{ "Médico Responsável: ".$receipt->collaborator->name }}</h3>
  
  <table width="100%" style="width:100%" border="0">
      @forelse($receipt->PrescriptMedicines as $PresciptMedicine)
        <tr>
          <td><p>{{$PresciptMedicine->medicine->generic_name}}</p></td>
          <td>....................................................</td>
          <td><p>{{$PresciptMedicine->quantity}}</p></td>
          <td><p>{{$PresciptMedicine->period}}</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        <td>
          @if($receipt->collaborator->signature)
          <img src="{{public_path('storage/'.$receipt->collaborator->signature)}}" 
          style="width:40px;height:40px;"/>
          @endisset
          <hr></hr>
        </td>
        </tr>
      @empty
      <tr>
        <td></td>
        <td></td>
      <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      <td></td>
      </tr>
      @endforelse
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    <td>{{$receipt->collaborator->name}}</td>
    </tr>
    </table>
</body>
</body>
</html>