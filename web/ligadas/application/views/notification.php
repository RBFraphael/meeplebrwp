<?php if($message = $this->session->flashdata("message")): ?>
<script type="text/javascript">
    Swal.fire({
        title: "<?= $message['type'] == "success" ? "Sucesso!" : "Erro!"; ?>",
        text: "<?= $message['message']; ?>",
        icon: "<?= $message['type'] == "success" ? "success" : "error" ?>",
    });
</script>
<?php endif; ?>