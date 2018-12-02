<ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Menu
                    </li>
                    @foreach($categorie as $ca)
                    <li href="#" class="list-group-item menu1">
                    	{{$ca->nom}}
                    </li>
                    <ul>
                        @foreach($ca->typeDePublication as $ty)
                        
                		<li class="list-group-item">  
                			<a href="typeDePublication/{{$ty->id}}/{{$ty->nomSansAccent}}.php">{{$ty->nom}}</a>    
                		</li>
                        
                		@endforeach
                    </ul>
                    @endforeach
                    
                </ul>