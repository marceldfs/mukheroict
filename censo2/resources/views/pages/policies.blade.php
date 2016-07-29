@extends('layout.app')
@section('content')
	<div class="container mukheroHack">
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default ">
					<div class="panel-heading panel-orange-heading">
						<h3 class="panel-heading-text text-center"> Regras de registro</h3>
					</div>
					<div class="panel-body black-text">
						<div class="text-center">
							<img src="image/edm-logobig.png" height="123" width="150"/>
						</div>
						<h4 class="text-center black-bold">CENSO 2016</h4>
                                                <p >
                                                    Para o efeito, todos os trabalhadores, reformados e pensionistas, com o apoio dos gestores de RH locais, dever&atilde;o preencher os formul&&aacute;rios fornecidos 
                                                    pela Direc&ccedil;o de Recursos Humanos e juntar os documentos comprovativos dos respectivos dados, conforme o descrito abaixo:                                                    
                                                </p>
                                                <ul class="black-bold">
                                                        <li>Fotocopia Leg&iacute;vel do Bilhete de Identidade</li>   
                                                        <li>Fotocopia Leg&iacute;vel do NUIT</li>    
                                                        <li>Fotocopia Leg&iacute;vel dos Documentos do Agregado familiar </li>                                                            
                                                </ul>
                                                
                                                <p >
                                                    Deste modo, abaixo apresentamos o esclarecimento de alguns aspectos que provavelmente poder&atilde;o suscitar d&uacute;vidas no preenchimento:
                                                </p>
                                                
                                                <ol type="I">
                                                    <li > 
                                                        <span class="black-bold">Membros do agregado familiar (art. 171, n&deg; 3 do MOPI Revisto)</span><br/>
                                                          <p> S&atilde;o membros do agregado familiar as pessoas a cargo do trabalhador, constantes da respectiva ficha individual, designadamente:
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            O c&ocirc;njugue ou sujeito da uni&atilde;o de facto;                                                       
                                                        </li>
                                                        <li>
                                                            Os descendentes(os filhos, adoptados e enteados);
                                                        </li>
                                                        <li>
                                                            Os ascendentes(pai,m&atilde;e, av&oacute;s, av&ocirc;s);
                                                        </li>
                                                        <li>
                                                            Dois colaterais(irm&atilde;os e sobrinhos ) - <span class="black-bold" > art. n&deg; 10 n&deg; 1 da Lei da Fam&iacute;lia </span>
                                                        </li>
                                                        
                                                    </ul>
                                                    </li>
                                                  
                                                    <li>
                                                        <span class="black-bold">Descendentes e colaterais do trabalhador que fazem parte do agregado familiar - </span> interpreta&ccedil;&atilde;o extensiva do <span class="black-bold"> art. 173 n&deg; 1 do MOPI revisto e art. 46, al&iacute;nea b) do Decreto 57/2007, de 3 de Dezembro: </span>
                                                        
                                                        <ul>
                                                            <li>
                                                                De 0 A 17 anos de idade (se n&atilde;o estiverem a estudar ou se ainda estiverem a frequentar o ensino prim&aacute;rio ou b&aacute;sico);
                                                            </li> 
                                                            <li>
                                                                De 18 a 21 anos de idade (se estiverem matriculados no curso m&eacute;dio);
                                                            </li>
                                                            <li>
                                                                De 22 a 25 anos (se estiverem matriculados no curso superior)                                                                
                                                            </li>
                                                            <li>
                                                                Sem limite de idade se sofrerem de incapacidade total e permanente para o trabalho, enquanto esta se mantiver. 
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ol>
                                                {{Form::open(['route'=>app('request')->input('tipo'),'method'=>'GET'])}}
                                                  {!!Form::submit('Confirmar',['class' => 'btn btn-warning pull-right','action'=>'/'.app('request')->input('tipo')]); !!}
					        {{Form::close()}}
                                        </div>
                                  
			</div>
		</div>
	</div>

@stop