<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Notificación de respuesta al tema - "<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>"

Hola <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>,

Estás recibiendo esta notificación porque sigues el foro, "<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>" de "<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>".
Este tema ha recibido una respuesta<?php if ($this->_rootref['AUTHOR_NAME'] !== ('')) {  ?> por <?php echo (isset($this->_rootref['AUTHOR_NAME'])) ? $this->_rootref['AUTHOR_NAME'] : ''; } ?> desde tu última visita.
Siguiendo este enlace puedes ver esa respuesta, no se enviarán más notificaciones hasta que visites ese tema.

Si quieres ver los nuevos mensajes desde tu última visita, haz clic en el siguiente enlace:
<?php echo (isset($this->_rootref['U_NEWEST_POST'])) ? $this->_rootref['U_NEWEST_POST'] : ''; ?>


Si quieres ver el tema, haz clic en el siguiente enlace:
<?php echo (isset($this->_rootref['U_TOPIC'])) ? $this->_rootref['U_TOPIC'] : ''; ?>


Si quieres ver el foro, haz clic en el siguiente enlace:
<?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?>


Si no quieres seguir más ese tema puedes hacer clic en "Cancelar suscripción al tema" cuando estés allí, o bien siguiendo este enlace:

<?php echo (isset($this->_rootref['U_STOP_WATCHING_TOPIC'])) ? $this->_rootref['U_STOP_WATCHING_TOPIC'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>