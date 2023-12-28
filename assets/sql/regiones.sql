CREATE TABLE `regiones` (
  `id` int(5) NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `regiones` (`id`, `region`) VALUES
(1, 'Arica y Parinacota'),
(2, 'Tarapacá'),
(3, 'Antofagasta'),
(4, 'Atacama'),
(5, 'Coquimbo'),
(6, 'Valparaíso'),
(7, 'Bernardo O’Higgins'),
(8, 'Maule'),
(9, 'Metropolitana de Santiago'),
(10, 'Ñuble'),
(11, 'Biobío'),
(12, 'Araucanía'),
(13, 'Los Ríos'),
(14, 'Los Lagos'),
(15, 'Aisén'),
(16, 'Magallanes');

ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `regiones`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;
