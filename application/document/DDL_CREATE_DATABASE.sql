
--
-- Database: `techsocial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--


--
-- Extraindo dados da tabela `user`
--

INSERT INTO `admin` (`id`, `login`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `order`
--

CREATE TABLE `order` (
    `id` INT NOT NULL AUTO_INCREMENT,          -- Coluna ID, chave primária e auto-incremento
    `user_id` INT NOT NULL,                    -- Coluna para armazenar o ID do usuário, chave estrangeira
    `description` VARCHAR(250),                -- Coluna para a descrição, com tamanho máximo de 250 caracteres
    `quantity` INT,                            -- Coluna para a quantidade
    `price` DOUBLE(12,2),                      -- Coluna para o preço, com até 12 dígitos no total e 2 casas decimais
    `created_at` DATETIME NOT NULL,            -- Coluna para a data e hora de criação
    `updated_at` DATETIME NOT NULL,            -- Coluna para a data e hora da última atualização
    PRIMARY KEY (`id`)                        -- Define a coluna ID como chave primária
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `order`
  ADD KEY `fk_playlist_user_idx` (`user_id`);