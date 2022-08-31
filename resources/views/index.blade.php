
<style>
.table-dark {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.table-dark td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.table-dark tr:nth-child(even){background-color: #f2f2f2;}

.table-dark tr:hover {background-color: #ddd;}

.table-dark th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #87CEFA;
  color: white;
}
</style>

<table class="table-dark">
  <thead>
    <tr>
      <th scope="col">Réf</th>
      <th scope="col">Name</th>
      <th scope="col">Type_produit</th>
      <th scope="col">Masse_volumique</th>
      <th scope="col">Cerfa</th>
      <th scope="col">Classe</th>
      <th scope="col">Lot</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($produit as $item)
    <tr>
    <th scope="row"> {{ $item-> id }} </th>
    <td>{{ $item-> name }}</td>
    <td>{{ $item-> Type_produit }}</td>
    <td>{{ $item-> Masse_volumique }}</td>
    <td>{{ $item-> Cerfa }}</td>
    <td>{{ $item-> Classe }}</td>
    <td>{{ $item-> Lot }}</td>
    @endforeach
  </tbody>
</table>
