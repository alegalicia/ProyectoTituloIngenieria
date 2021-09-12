SELECT
  u.estado,
  u.idrol,
  u.idusuarios,
  r.rol,
  r.idroles,
  r.estado,
  p.apellidos,
  p.nombres
FROM
  usuarios u
  inner join roles r on r.idroles = u.idusuarios
  inner join personas p on p.idpersonas = u.idpersona
where
  u.estado = 1
  AND r.estado = 1
  AND p.estado = 1
  AND p.rut = 1
  AND u.clave = 1;