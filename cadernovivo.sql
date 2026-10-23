--
-- PostgreSQL database dump
--

\restrict gxp2H6t2By3LwRoohZaKz0J5QpSkdlLO9bpAYYo7rg4bRlc4mrU5VPxYg6jdIeP

-- Dumped from database version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: produtos; Type: TABLE; Schema: public; Owner: cadernovivo
--

CREATE TABLE public.produtos (
    id integer NOT NULL,
    nome_produto character varying(400) NOT NULL,
    preco character varying(100) NOT NULL,
    data_validade character varying(255),
    descricao character varying(500) NOT NULL,
    quantidade_estoq integer NOT NULL,
    imagem_url character varying(512) NOT NULL
);


ALTER TABLE public.produtos OWNER TO cadernovivo;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: cadernovivo
--

CREATE SEQUENCE public.produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_id_seq OWNER TO cadernovivo;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cadernovivo
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produtos.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: cadernovivo
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(255),
    telefone character varying(255),
    email character varying(255),
    endereco text,
    senha character varying(255),
    is_admin boolean DEFAULT false
);


ALTER TABLE public.usuarios OWNER TO cadernovivo;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: cadernovivo
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO cadernovivo;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cadernovivo
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: produtos id; Type: DEFAULT; Schema: public; Owner: cadernovivo
--

ALTER TABLE ONLY public.produtos ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: cadernovivo
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: cadernovivo
--

COPY public.produtos (id, nome_produto, preco, data_validade, descricao, quantidade_estoq, imagem_url) FROM stdin;
5	Bloco de notas	35.00		Bloco de notas cor de rosa - 150 paginas 5 matérias\t	100	https://s3.amazonaws.com/lepok.w/produtos/produtos/01610.webp
6	Caderno Cor de Rosa	40.00		Especificações: 10 matérias; 160 folhas; Espiral	145	https://http2.mlstatic.com/D_NQ_NP_677441-MLA115355480833_072026-OO.jpg
8	Estojo Cor De Rosa - Poliéste	50.00		Especificação: 3 partições; Material Poliéster; Fechamento Em zíper; Dimensões 22,5 cm x 11,5 cm\t	76	https://img.kalunga.com.br/fotosdeprodutos/265661z.jpg
9	Lápis de Cor Pastel 12 Cores Faber Castel	36.00		Especificações: Lápis de cor 12 cores Sparkle pastel 116156 - Faber-Castell	45	https://s3.amazonaws.com/lepok.w/produtos/produtos/13786.webp
10	Planner 2026 Cor de Rosa	154.00		Especificações técnicas: . Produto: Agenda Planner Diário 2026 ? Clássica Rosa Orquídea . Ano: 2026 . Formato: 14 x 21 cm . Número de páginas: 360 páginas . Gramatura do papel: 80 g/m² . Tipo: diário . Conteúdo: datado\t	48	https://cdnv2.moovin.com.br/marbig/imagens/produtos/original/planner-grampeado-17-8-x-25-4-cm-happy-90-g-2026-rosa-img-244708_1704261541583362.jpg
7	Canetas Stabilo Kit 8 Cores	32.00		Especificações: Canetas Com ponta Hidrografica; Ponta 0.88; Contem Kit com 8 Canetas	123	https://acdn-us.mitiendanube.com/stores/001/676/220/products/9aa9cd0e964208a615b68e188663be27-51d6a2966a0ca7d29e17419632592356-1024-1024.webp
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: cadernovivo
--

COPY public.usuarios (id, nome, telefone, email, endereco, senha, is_admin) FROM stdin;
1	Livia simões	19 9999-9999	livia@gmail.com	Av. Brasil, 123 - Americana	livia123	f
7	mirella tainá	19 9456-3456	Rua central, bairro central 123	mirella@gmail.com	mirella123	f
8	henrique	19 9456-3459	Rua Joao bobo, Bairro Joao bobo 	henrique@gmail.com	henriquelindo123	f
3	Administrador 1	19 97127-1207	admin@gmail.com	Rua Doutor Angelino Sanches, Jd. São Pedro 301	admin123	t
4	Administrador 2	19 9234-3456	admin2@gmail.com	Av. Pascoal Ardito, 153	admin2cadernovivo	t
\.


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: cadernovivo
--

SELECT pg_catalog.setval('public.produtos_id_seq', 10, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: cadernovivo
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 55, true);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: cadernovivo
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: produtos produtos_preco_key; Type: CONSTRAINT; Schema: public; Owner: cadernovivo
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_preco_key UNIQUE (preco);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: cadernovivo
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict gxp2H6t2By3LwRoohZaKz0J5QpSkdlLO9bpAYYo7rg4bRlc4mrU5VPxYg6jdIeP

