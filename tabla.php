<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    
        <style>
     * {margin:0;padding:0; border: 0 none; position: relative;}
*, *:before, *:after {box-sizing: inherit;}
html{
  box-sizing: border-box;
  background: #0D757D;
  font-size: 1rem;
  color: #e6eff0;
  font-family: Roboto Slab;
}
h1 {
  font-weight: normal;
  font-variant: small-caps;
  text-align: center;
}
table * {height: auto; min-height: none;} /* fixed ie9 & <*/
table {
  background: #15BFCC;
  table-layout: fixed;
  margin: 1rem auto;
  width: 98%;
  box-shadow: 0 0 4px 2px rgba(0,0,0,.4);
  border-collapse: collapse;
  border: 1px solid rgba(0,0,0,.5);
  border-top: 0 none;
}
thead {
  background: #FF7361;
  text-align: center;
  z-index: 2;
}
thead tr {
  padding-right: 17px;
  box-shadow: 0 4px 6px rgba(0,0,0,.6);
  z-index: 2;
}
th {
  border-right: 2px solid rgba(0,0,0,.2);
  padding: .7rem 0;
  font-size: 1.5rem;
  font-weight: normal;
  font-variant: small-caps;
}
tbody {
  display: block;
  height: calc(50vh - 1px);
  min-height: calc(200px + 1 px);
  /*use calc for fixed ie9 & <*/
  overflow-Y: scroll;
  color: #000;
}
tr {
  display: block;
  overflow: hidden;
}
tbody tr:nth-child(odd) {
  background: rgba(0,0,0,.2);
}
th, td {
  width: 21%;
  float:left;
}
td {
  padding: .5rem 0 .5rem 1rem;
  border-right: 2px solid rgba(0,0,0,.2);
}
td:nth-child(2n) {color: #fff;}
[data-campo='Mail'] {
  width: 30%;
}  
th:last-child, td:last-child {
  width: 7%;
  text-align: center;
  border-right: 0 none;
  padding-left: 0;
}


@media only screen and (max-width:800px) {
  table {
    border-top: 1px solid ;
  }
  thead {display: none;}
  tbody {
    height: auto;
    max-height: 55vh;
  }
  tr {
    border-bottom: 2px solid rgba(0,0,0,.35);
  }
  tbody tr:nth-child(odd) {background: #15BFCC;}
  tbody tr:nth-child(even) {background:#FF7361;}
  td {
    display: block;
    width: 100%;
    min-width: 100%;
    padding: .4rem .5rem .4rem 40%;
    border-right: 0 none;
  }
  td:before {
    content: attr(data-campo);
    background: rgba(0,0,0,.1);
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: auto;
    min-width: 37%;
    padding-left: .5rem;
    font-family: monospace;
    font-size: 150%;
    font-variant: small-caps;
    line-height: 1.8;
  }
  tbody td:last-child {
    text-align: left;
    padding-left: 40%;
  }
  td:nth-child(even) {
    background: rgba(0,0,0,.2);
  }
}
a {color: #FF7361}
            
        </style>      
        
        
        
    </head>
    <body>
      <table>
 <thead>
    <tr>
     <th data-campo='Nick'>Nick</th>
   <th data-campo='Mail'>Mail</th>
   <th data-campo='Web'>Web</th>
   <th data-campo='Twitter'>Twitter</th>
   <th data-campo='Id'>Id</th>
    </tr>
 </thead>
 <tbody>
    <tr>
     <td data-campo='Nick'>Fulano</td>
   <td data-campo='Mail'>Fulano@gmail.com</td>
   <td data-campo='Web'>fulano.es</td>
   <td data-campo='Twitter'>@Fulano</td>
     <td data-campo='Id'>1</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Mengano</td>
        <td data-campo='Mail'>Mengano@mail.com</td>
        <td data-campo='Web'>mengano.com</td>
        <td data-campo='Twitter'>@Mengano</td>
        <td data-campo='Id'>2</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Zutano</td>
        <td data-campo='Mail'>Zutano@gmail.com</td>
        <td data-campo='Web'>zutano.org</td>
        <td data-campo='Twitter'>@Zutano</td>
        <td data-campo='Id'>3</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.es</td>
        <td data-campo='Web'>fulanito.io</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>4</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulan</td>
        <td data-campo='Mail'>Fulan@correo.es</td>
        <td data-campo='Web'>fulan.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>5</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>fulanito.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>6</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>Pilla pilla</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>7</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>fulanito.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>8</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>fulanito.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>9</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>fulanito.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>10</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>fulanito.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>11</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>fulanito.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>12</td>
    </tr>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>Pilla pilla</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>13</td>
    <tr>
        <td data-campo='Nick'>Fulanito</td>
        <td data-campo='Mail'>Fulanito@mail.com</td>
        <td data-campo='Web'>fulanito.com</td>
        <td data-campo='Twitter'>@Fulanito</td>
        <td data-campo='Id'>14</td>
    </tr>
    </tr>
 </tbody>
</table>

    </body>
</html>
