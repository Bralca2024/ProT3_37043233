# Puerto en mySQL: 3306

# Importante
La base de datos se encuentra en la carpeta BD bajo el nombre cabral_fernando.sql

# Funcionalidades generales
 * Registro
 * Login
 * Cierre de la sesión
 * Validaciones de los formularios ( registro - login )
 * Navbar adaptable acorde al rol del usuario ( Administrador - Cliente )

# Funcionalidades del administrador
 * Tiene la capacidad de visualizar la tabla de todos los usuarios activos
 * Puede crear nuevas cuentas, editar, actualizar y eliminar los usuarios de dicha tabla
 * Puede observar la lista de usuarios dados de baja y y activar sus cuentas nuevamente
 * Se crearon rutas protegidas para que solo el administrador pueda tener acceso a dichas funcionalidades

# Funcionalidades del cliente
 * Puede ver una sección extra al momento de loguearse (Nuestros cursos)
 * Puede entrar a su perfil y editar su información correspondiente ( con validaciones )
 * Se crearon rutas protegidas para que solo el usuario pueda tener acceso a dichas funcionalidades y secciones.
