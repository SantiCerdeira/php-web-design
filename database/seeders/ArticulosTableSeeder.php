<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(table:'articulos')->insert([
            [
                'articulo_id'=>1,
                'usuario_id'=>1,
                'categoria_id'=>2,
                'titulo'=>'Tendencias en Diseño Web: Neo-Brutalismo',
                'descripcion'=>'Hace unos meses Verónica nos enseñó cuales iban a ser las tendencias de diseño para este año 2022. Entre ellas nos encontrábamos dos que cada vez estamos viendo en más sitios web: la vuelta a los 90 y el maximalismo. Y estas dos tendencias prácticamente se tocan en un estilo que está tomando cada vez más fuerza: el neobrutalismo.',
                'cuerpo' => '
                <section>
                <h2> Neo-brutalismo </h2>
                <p> Si os gusta el arte y la arquitectura, seguramente habéis oído hablar del brutalismo. El brutalismo es un movimiento arquitectónico que surgió a mitad del siglo XX y que apostaba por mostrar los materiales y las estructuras en bruto, abandonando por completo cualquier complemento estético u ornamentación. Es un estilo en el que la funcionalidad está por encima de todo, y que no tiene miedo a enseñarla.</p>

                <p> Pero, ¿qué tiene que ver esto con el diseño web y el neobrutalismo?. Básicamente, queremos poner un poco de contexto sobre que otras tendencias se apoya y evoluciona el neobrutalismo, para saber porque es así y que podamos usarla en nuestros diseños conociendo todos sus detalles. Por ello, en primer lugar, queremos mostraros otras dos tendencias que, a primera vista, pueda parecer que no tengan muchos puntos en común, si los analizamos veremos que si los tienen. Y después nos centraremos en el neobrutalismo en si, y cuales son sus criterios básicos.</p>
                </section>

                <section>
                <h2> Minimalismo y Brutalismo </h2>
                <p> Para entender cuales son los principios que rigen el diseño neobrutalista, lo mejor es empezar hablando por dos tendencias que, aunque distintas entre si, comparten ciertos valores. Y nos van a ayudar a entender como el neobrutalismo es, en cierta manera, una evolución de estos.</p>

                <p> El primero es el <b>minimalismo</b>. En diseño web, seguro que habéis visto muchos sitios con este estilo. Sin ir más lejos, hace un tiempo os mostramos algunas de las mejores plantillas minilmalistas para WordPress. Este minimalismo se basa en el menos es más, la simplificación de la interfaz mediante la eliminación de cualquier elemento innecesario: </p>

                <ul>
                    <li>Pocos colores, con tendencia al blanco/negro/gris, o algún toque de color muy sutil.</li>
                    <li>Uso potente y bien pensado del espacio en blanco.</li>
                    <li>Expresión al mínimo de sombras, animaciones, transiciones…</li>
                    <li>Iconos simples y con estilo flat design.</li>
                </ul>

                <p>De este minimalismo pasamos al <b>brutalismo</b>. Si vimos antes como era el brutalismo en la arquitectura, en el diseño web casi tiene una traslación completa:</p>

                <ul>
                    <li>Sin miedo a mostrar la web con la estructura del HTML tal cual.</li>
                    <li>El uso del color casi se reduce en su totalidad al blanco y negro, totalmente planos y con un fuerte contraste.</li>
                    <li>Elementos que se superponen, o que no tienen un ritmo consistente.</li>
                </ul>

                <p>Este brutalismo es prácticamente no darle estilo de ningún tipo a nuestra web, salvo en contadas excepciones. Si en la arquitectura se buscaba la pureza de los materiales y la estructura, en el diseño web se quiere que se confía en la estructura pura del HTML como elemento básico y natural para la navegación, sin intermediarios.</p>
                </section>',
                'portada'=>'neobrutalismo.jpeg',
                'portada_descripcion'=>'Neobrutalismo',
                'fecha_publicacion' => '2022-10-10',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'articulo_id'=>2,
                'usuario_id'=>2,
                'categoria_id'=>4,
                'titulo'=>'Vender en internet: mitos y sus verdades para que inviertas de forma inteligente',
                'descripcion'=>'No tener claras las prioridades y las expectativas a la hora de vender en internet pueden llevar a un negocio a perder mucho dinero e incluso a cerrar la persiana. Esto puede ocurrir incluso después de un periodo exitoso en internet, si no se proyecta el crecimiento de forma adecuada.',
                'cuerpo' => '
                <section>
                <h2> Introducción a las ventas por internet </h2>
                <p>Hace unos pocos días una tienda de decoración con tienda física de barrio a la que gestionamos la publicidad en Google y la visibilidad orgánica (sin pagar a Google) mediante contenidos nos explicaba que se estaban planteando cerrar. Evidentemente la pandemia del Covid-19 ha influido en su facturación como en la de la mayoría de negocios, pero su error venía de lejos, de no entender las implicaciones de ofrecer sus servicios en internet. De hecho, desde que renovamos su página web y gestionamos su visibilidad con publicidad, tuvieron dos años de muchos beneficios. Pero a raíz de ahí tomaron todas las decisiones equivocadas.</p>
                
                <p>Lo cierto es que una web que genere interés y confianza, e incluso que nos ahorre parte del trabajo de gestión de las solicitudes de información o las compras requiere una cierta inversión. No vale 500 dólares como cobran algunos desarrolladores. Por ejemplo, que ofrezca la información adecuada para luego no tener que dedicar tiempo a darla a los usuarios cuando nos contacten, o que en sus formularios de contacto solicite los datos que nos ayuden a determinar la prioridad de una solicitud, o que permita vender o hacer presupuestos online, etc., o que aparezca en los primeros resultados de Google, requiere pagar a profesionales con competencias.</p>

                <p>Por estos motivos tampoco son adecuadas para un negocio que aspire a aumentar su facturación con su web las desarrolladas con plataformas como Wix. Lo que va a hacer que tu web sea «ganadora», como dicen incansablemente en sus anuncios de YouTube, no es poder diseñártela tú mismo, por mucho buen gusto que tengas. Es saber qué contenidos son adecuados (tanto textos como imágenes), qué funciones te conviene más incorporar, etc. Y eso no te lo dirá un desarrollador que sólo se dedique a personalizarte una plantilla o una plataforma como Wix. Te lo dirá un especialista en márketing online. <b>Y no te costará 500 dólares sino más</b>.</p>
                </section>
                
                <section>
                <h2> ¡A poner en práctica! </h2>
                <p>Todo lo que hemos explicado hasta ahora es para poner a punto una web o tienda online. Luego hace falta, como hemos dicho al principio, empezar a vender. Si no tienes vías alternativas para dar a conocer la web, que es lo más habitual, necesitarás una campaña de publicidad y trabajar el posicionamiento orgánico, es decir, subir posiciones en Google sin pagarle por ello, con contenidos de calidad periódicos. La publicidad te permite obtener rendimiento en todo momento de la web y el posicionamiento orgánico, que tarda meses en dar resultado, es una forma de que tengas un flujo de visitas constante, sin tener que pagar a Google o a una red social por el tráfico que te llega. Y que esas visitas terminen en un porcentaje lo más alto posible de solicitudes de información o de ventas.<p>
                </section>',
                'portada'=>'venderInternet.jpeg',
                'portada_descripcion'=>'Vender en internet',
                'fecha_publicacion' => '2022-10-11',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
            [
                'articulo_id'=>3,
                'usuario_id'=>1,
                'categoria_id'=>4,
                'titulo'=>'Estrategia SEO: cómo hacerla y por qué tu web no es nada sin ella',
                'descripcion'=>'En la mayoría de negocios que quieren abrirse camino en internet, pensar que primero necesitan una web y más adelante su estrategia de posicionamiento es asumir que primero hay que poner la papelería y luego comprobar si hay otra al lado, o que primero hay que poner la peluquería cerca de otra y luego decidir cómo se le hace competencia.',
                'cuerpo' => '
                <section>
                <h2> Introducción al SEO</h2>
                <p>Aunque muchos piensen que conocen bien su sector, la comercialización online es un mundo aparte. Requiere un experto en márketing online, preferiblemente un growth hacker, que estudie exhaustivamente el sector y defina estrategias para competir en él y luego implementar esa estrategia en la página web. Y eso tiene mucho prácticamente el mismo valor económico que muchas webs, ya que determina que el mismo desarrollo web sirva para algo o para nada.</p>

                <p>Por muy bonito que sea el diseño de una web, si no logra subir posiciones en Google por palabras que tengan suficientes búsquedas y una competencia asequible para poderla batir sólo servirá para que lleguen a ella los clientes que ya conocen de su existencia, es decir, que más allá de felicitarnos por lo bonita que es, no van a aumentar nuestra facturación porque ya los habíamos captado antes. Es una web que no funciona para lo que generalmente sirve: atraernos nuevos clientes. La red está llena de negocios fallidos con webs preciosas.</p>
                </section>

                <section>
                <h3>Para qúe sirve el SEO y cómo aplicarlo</h3>
                <p><b>El SEO es, por lo tanto, un objetivo constante y a largo plazo</b>, que consiste en perseverar haciendo una inversión constante, conocer a nuestro público objetivo y ofrecer contenidos de calidad. Por eso es buena idea dejarlo en manos de quien conozca a fondo las técnicas SEO, elija temas originales y tenga creatividad a la hora de escribir y elegir imágenes para ilustrar los contenidos.</p>
                </section>',
                'portada'=>'seoweb.jpeg',
                'portada_descripcion'=>'SEO Web',
                'fecha_publicacion' => '2022-10-12',
                'created_at'=>now(),
                'updated_at'=>now(),
            ],
        ]);
    }
}
