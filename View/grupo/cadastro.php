<div class="row">
    <div class="span12">
        <div class="page-header">
            <h3>Cadastro de Grupo</h3>
        </div>
        
        <form role="form" action="?class=Grupo&method=onSalvar" method="POST">
        <div class="form-group col-sm-2">
            <label>Código</label>
            <input type="text" class="form-control" name="codigo" disabled="disabled">
       	</div>
        <div class="form-group col-sm-10">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <div class="col-sm-2 pull-right">
            <button class="btn btn-warning ">Limpar</button> 
            <button class="btn btn-success pull-right">Adicionar</button>
        </div>  
        </form>            
    </div>
</div>