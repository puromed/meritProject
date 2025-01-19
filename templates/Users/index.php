<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<!-- css file -->
<?php 
    echo $this->Html->css("external/dashboard.css", ['block' => true]);
    echo $this->Html->css("custom.css");
    echo $this->Html->css("usersIndex.css");
    // Datatables 
    echo $this->Html->css('https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css');
    // Add DataTables Responsive CSS
    echo $this->Html->css('https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css');
?> 
<!-- bs css -->
<?php echo $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
      echo $this->Html->css('external/datatables-custom.css');
      echo $this->Html->css('external/users.css');
?>


<div class="users index content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3><?= __('Users Management') ?></h3>
            <?= $this->Html->link(__('Add User'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div class="card-body">
            <table id="usersTable" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created</th>
                        <th>modified</th>
                        <th class="actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= h($user->email) ?></td>
                        <td>
                            <span class="badge <?= $user->role === 'admin' ? 'bg-danger' : 'bg-primary' ?>">
                                <?= h($user->role) ?>
                            </span>
                        </td>
                        <td><?= h($user->created->format('Y-m-d')) ?></td>
                        <td><?= h($user->modified->format('Y-m-d')) ?></td>
                        <td class="actions">
                            <div class="btn-group" role="group">
                                <?= $this->Html->link(
                                    '<i class="fas fa-eye"></i>',
                                    ['action' => 'view', $user->id],
                                    ['class' => 'btn btn-sm btn-info', 'escape' => false, 'data-bs-toggle' => 'tooltip', 'title' => 'View']
                                ) ?>
                                <!-- <a href="#" 
                                   class="edit-user-btn btn btn-warning btn-sm" 
                                   data-user-id="<?= h($user->id) ?>">
                                    <i class="fas fa-edit"></i> Edit
                                </a> -->
                                <?= $this->Form->postLink(
                                    '<i class="fas fa-trash"></i>',
                                    ['action' => 'delete', $user->id],
                                    ['confirm' => __('Are you sure you want to delete this user?'),
                                     'class' => 'btn btn-sm btn-danger',
                                     'escape' => false,
                                     'data-bs-toggle' => 'tooltip',
                                     'title' => 'Delete'
                                    ]
                                ) ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- view modal -->
            <?= $this->element('Users/view_modal') ?>
        </div>
    </div>
</div>

<!-- Add JavaScript dependencies -->
 <?php 
    echo $this->Html->script('https://code.jquery.com/jquery-3.7.1.min.js');
    echo $this->Html->script('https://cdn.datatables.net/1.13.7/js/dataTables.min.js');
    echo $this->Html->script('https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js');
    echo $this->Html->script('https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js');
    echo $this->Html->script('https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js');
 ?>

<!-- Initialize DataTables -->
 <?php $this->append('script'); ?>
<script>
    $(document).ready(function(){
        $('#usersTable').DataTable({
            responsive: true,
            order: [[2, 'desc']],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search users..."
               
            },
            columnDefs: [
                {
                    targets: -1,
                    orderable: false,
                    searchable: false
                }
            ],
            
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl){
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

            // handle view button click
        $('#usersTable').on('click', '.btn-info', function(e){
            e.preventDefault();
            const userId = $(this).attr('href').split('/').pop();
            loadUserDetails(userId);
        });

        // // Handle edit button click in the table
        // $('.edit-user-btn').on('click', function(e) {
        //     e.preventDefault();
        //     const userId = $(this).data('user-id');
        //     const editUrl = '<?= $this->Url->build(['controller' => 'Students', 'action' => 'edit']) ?>';
        //     window.location.href = `${editUrl}/${userId}`;
        // });
    });

function loadUserDetails(userId) {
    const viewUrl = '<?= $this->Url->build(['controller' => 'Users', 'action' => 'view']) ?>';
    $.get(`${viewUrl}/${userId}`, function(response) {
        // Update Account Information
        $('#userEmail').text(response.user.email);
        $('#userRole')
            .text(response.user.role)
            .removeClass()
            .addClass(`badge ${response.user.role === 'admin' ? 'bg-danger' : 'bg-primary'}`);
        $('#userCreated').text(response.user.created);
        $('#userModified').text(response.user.modified);

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('viewUserModal'), {
            backdrop: false  // Disable backdrop
        });
        modal.show();
        
        // Remove any existing backdrop
        $('.modal-backdrop').remove();
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Error loading user details:', errorThrown);
        alert('Error loading user details. Please try again.');
    });
}

// Additional handler to ensure backdrop is removed when modal is hidden
$(document).ready(function() {
    $('#viewUserModal').on('hidden.bs.modal', function () {
        $('.modal-backdrop').remove();
    });
});
</script>
<?php $this->end(); ?>