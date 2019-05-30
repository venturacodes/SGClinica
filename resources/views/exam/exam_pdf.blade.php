<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Resultado Exame</title>
</head>
<body>
  <h1>{{ "Clínica: ".$exam->collaborator->clinic->name }}</h1>
  <h3>{{ "Médico Responsável: ".$exam->collaborator->name }}</h3>
  
  <table width="100%" style="width:100%" border="0">
        <tr>
          <td><h3>Exame solicitado:</h3></td>
          <td><h3>{{$exam->examType->title}}</h3></td>
        </tr>
        @isset($exam->note)
          <tr>
            <td><h3>Cuidados e observações</h3></td>
            <td>{{$exam->note}}</td>
          </tr>
        @endisset
        <tr>
          <td><h3>Resultado obtido:</h3></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>* {{$exam->result->result}}</td>>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        <td>
          @isset($exam->collaborator->signature)
          <img src="{{public_path('storage/'.$exam->collaborator->signature)}}" 
          style="width:40px;height:40px;"/>
          @endisset
        </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td><hr></hr></td>
        <td>&nbsp;</td>
        
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>{{$exam->collaborator->name}}</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>{{"CRM: ".$exam->collaborator->crm}}  </td>
        <td>&nbsp;</td>
      </tr>
    </table>
</body>
</body>
</html>