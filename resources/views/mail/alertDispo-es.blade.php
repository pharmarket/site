<table cellpadding="0" cellspacing="0" border="0" style="font-family:Helvetica,Arial,Verdana,sans-serif;border-collapse:collapse">
  <tbody>
    <tr>
        <td>
          <table cellpadding="0" cellspacing="0" border="0" style="font-family:Helvetica,Arial,Verdana,sans-serif;border-collapse:collapse;color:#6d6d6d!important;border:1px solid #dbdce0!important;border-top:0 none!important;border-bottom-color:#c6c7cc!important;border-radius:5px!important;font-family:Helvetica,Arial,Verdana,sans-serif!important">
              <tbody>
                <tr>
                  <td colspan="4" height="40" style="background-color:white;border-top-left-radius:5px!important;border-top-right-radius:5px!important"></td>
                </tr>
                <tr>
              <td width="8%" style="background-color:white"></td>
              <td width="600" style="font-size:14px;line-height:20px;padding-bottom:0.5em;background-color:white;font-family:Helvetica,Arial,Verdana,sans-serif;text-align:left;color:#3e414a!important">
                  <p style="margin:0 0 1em 0">Hola,</p>
                    <p style="margin:0 0 1em 0">Nos complace informarle de que el producto que la referencia {{$produit->reference}} está disponible de nuevo.</p>
                    <p style="margin:0 0 1em 0"><strong>Información del Producto :</strong><br>
                    Marca : {{$produit->marque->nom}}<br>
                    Categoria : {{$produit->categorie->nom}}<br>
                    Subcategoría : {{$produit->sous_categorie->nom}}<br>
                    </p>
                    <p>Cordialmente,</p>
                    <p>Pharmarket</p>
              </td>
            </tr>
            </tbody>
          </table>
        </td>
    </tr>
    </tbody>
</table> 