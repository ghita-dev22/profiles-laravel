<div class="card my-2 bg-light">
    <div class="card-body">
        
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update',$publication)): ?>
            <a class="float-end btn btn-primary btn-sm" href="<?php echo e(route('publications.edit', $publication->id)); ?>">Modifier</a>
        <?php endif; ?>
         
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete',$publication)): ?>
            <form action="<?php echo e(route('publications.destroy', $publication->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field("DELETE"); ?>
                <button onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?')" class="mx-2 float-end btn btn-danger btn-sm">Supprimer</button>
            </form>
        <?php endif; ?>
        
        <blockquote class="blockquote mb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img class="rounded-circle" src="<?php echo e(asset($publication->profile->image)); ?>" width="55px" alt="Image du profil">
                    </div>
                    <div class="col">
                        <p><?php echo e($publication->profile ? $publication->profile->name : 'Profil non défini'); ?></p>
                        <a href="<?php echo e(route('profiles.show', $publication->profile->id)); ?>" class="stretched-link"></a>
                       
                        <p><?php echo e($publication->titre); ?></p>
                        
                    </div>
                </div>
                
                <p><?php echo e($publication->body); ?></p>
                <footer class="footer">
                    <img class="img-fluid" src="<?php echo e(asset('storage/' . $publication->image)); ?>" alt="Image de la publication">
                </footer>
            </div>
        </blockquote>
      
    </div>
</div>
<?php /**PATH C:\Users\LENOVO\profiles\profiles\resources\views/components/publication.blade.php ENDPATH**/ ?>