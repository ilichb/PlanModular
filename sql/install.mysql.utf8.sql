CREATE TABLE IF NOT EXISTs `microservicios`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `valor` int(4) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `sector_economico` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    `recomendaciones` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `usuario` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL UNIQUE,
    `empresa` varchar(255) NOT NULL UNIQUE,
    `sector` varchar(255) NOT NULL,
    `respuesta_algoritmo` text,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `sector_microservicios` (
    `sector_id` int(11) NOT NULL,
    `microservicio_id` int(11) NOT NULL,
    PRIMARY KEY (`sector_id`, `microservicio_id`),
    FOREIGN KEY (`sector_id`) REFERENCES `sector_economico`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`microservicio_id`) REFERENCES `microservicios`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


USE microservicios;

INSERT INTO microservicios (nombre, valor) VALUES  ('Análisis de mercado', 6),('Investigación de la competencia', 4), ('Estrategia de marketing', 7), ('Identidad visual:', 5), ('Diseño de marca', 4), ('Diseño gráfico', 3), ('Desarrollo de sitio web', 8), ('Diseño web responsivo', 2), ('Comercio electrónico', 2), ('Integración de CRM:', 1), ('Integración de API', 1), ('Integración de chat en vivo', 1), ('Ciberseguridad', 3), ('Auditoría de seguridad', 1), ('Protección de datos', 1), ('Monitoreo y respuesta a incidentes', 1), ('Desarrollo de aplicaciones', 6), ('Desarrollo de aplicaciones móviles', 3), ('Desarrollo de aplicaciones web', 2), ('Desarrollo de aplicaciones de escritorio', 1), ('Optimización de motores de búsqueda (SEO)', 6),  ('Inbound marketing', 7),  ('Marketing de contenido', 3),  ('Automatización de marketing', 2),  ('Generación de leads', 2),  ('Marketing por correo electrónico', 3),  ('Publicidad en línea (Google Ads, Facebook Ads, etc.)', 6),  ('Marketing en redes sociales', 5),  ('Marketing de influencia', 4),  ('Relaciones públicas:', 4),  ('Gestión de eventos', 3),  ('Análisis de datos y métricas', 5),  ('Estrategia de ventas', 5),  ('Entrenamiento de ventas', 3),  ('Servicio al cliente', 3),  ('Gestión de reputación en línea', 4),  ('Marketing de experiencias', 2),  ('Marketing de guerrilla', 2),  ('Marketing móvil', 2),  ('Marketing en video', 2),  ('Marketing en podcast', 2),  ('Marketing en realidad virtual y aumentada', 1),  ('Marketing de voz', 1),  ('Marketing en aplicaciones', 1),  ('Marketing de gamificación', 1),  ('Marketing de contenido interactivo:', 1),  ('Marketing de prueba social', 1),  ('Marketing de localización y geolocalización', 1),  ('Marketing en eventos virtuales', 1),  ('Marketing de asociación', 1),  ('Marketing de afiliación', 1),  ('Marketing de productos y servicios', 1);
