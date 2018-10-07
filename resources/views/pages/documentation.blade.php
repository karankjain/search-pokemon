@extends('layout.app')

@section('content')

<p><strong>Documentation</strong></p>
<p>1. To load the new content via JSON file go to <a href="http://rescue.karanjain.info/loadjson">loadjson</a> and submit the path of the JSON file. This will replace the current data with the data from the JSON file. An assumption has been made that the JSON file would be in proper format.</p>
<p>2. On the home page one each key stroke inside the search box an event would be fired in javascript which will check for the Pokemons with name or types that is a fuzzy match for the input string.</p>
<p>3. The code is available at GitHub. Click <a href="https://github.com/karankjain/search-pokemon">here</a> to view the same.</p>

@endsection
