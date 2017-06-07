
-- Insertar Datos Basicos

INSERT INTO `persona` (`id`, `rut`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `contacto`, `activo`, `gestor`, `cliente`) VALUES ('2', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 'Admin', 'Admin', 'fecha', 'dir', '234234', '1', '1', '0');
INSERT INTO `persona` (`id`, `rut`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `contacto`, `activo`, `gestor`, `cliente`) VALUES ('3', 'cliente', '356a192b7913b04c54574d18c28d46e6395428ab', 'Cliente', 'Cliente', 'fecha', 'dir', '234234', '1', '0', '1');
INSERT INTO `persona` (`id`, `rut`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `contacto`, `activo`, `gestor`, `cliente`) VALUES ('4', 'ambos', '356a192b7913b04c54574d18c28d46e6395428ab', 'Ambos', 'Ambos', 'fecha', 'dir', '234234', '1', '1', '1');

-- Categorias Basicas
INSERT INTO `category` (`id`, `nombre`) VALUES ('1', 'Estomago');
INSERT INTO `category` (`id`, `nombre`) VALUES ('2', 'Cabeza');
INSERT INTO `category` (`id`, `nombre`) VALUES ('3', 'Ojos');
INSERT INTO `category` (`id`, `nombre`) VALUES ('4', 'Espalda');
INSERT INTO `category` (`id`, `nombre`) VALUES ('5', 'Manos');
INSERT INTO `category` (`id`, `nombre`) VALUES ('6', 'Pies');

-- Sintomas Basicos
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('1', 'Acidez', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('2', 'Nauseas', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('3', 'Dolor Punzante', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('4', 'Ardor', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');


INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('5', 'Dolor Zona Frontal', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '2');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('6', 'Mareos', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '2');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('7', 'Perdida de Memoria', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '2');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('8', 'Desmayos', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '1', '2');



INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('9', 'Dolor Lumbar', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '4');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('10', 'Dolor Muscular', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '4');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('11', 'Perdida de Movilidad', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '1', '4');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('12', 'Fractura Expuesta', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '1', '4');

INSERT INTO `ambulancia` (`id`, `patente`, `persona_id`) VALUES (NULL, 'amb1', NULL);
INSERT INTO `ambulancia` (`id`, `patente`, `persona_id`) VALUES (NULL, 'amb2', NULL);
INSERT INTO `ambulancia` (`id`, `patente`, `persona_id`) VALUES (NULL, 'amb3', NULL);
INSERT INTO `ambulancia` (`id`, `patente`, `persona_id`) VALUES (NULL, 'amb4', NULL);
INSERT INTO `ambulancia` (`id`, `patente`, `persona_id`) VALUES (NULL, 'amb5', NULL);