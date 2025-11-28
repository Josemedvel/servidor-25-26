import { Pool } from "pg"

const pool = new Pool({
    user: process.env.DB_USER,
    host: process.env.DB_HOST,
    database: process.env.DB_NAME,
    password: process.env.DB_PASSWORD,
    port: process.env.DB_PORT,
    max: 20, // este es nuestro máximo de conexiones
    idleTimeoutMillis: 30000,
    connectionTimeoutMillis: 2000,
})

async function seed() {
    const client = await pool.connect()

    try {
        console.log("Iniciando ingesta inicial")
        // Iniciamos transacción
        await client.query("BEGIN")
        // Tiramos la tabla
        await client.query("DROP TABLE IF EXISTS pruebas CASCADE")
        // Creamos la tabla
        await client.query(`
      CREATE TABLE pruebas (
        id SERIAL PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        edad INTEGER CHECK (edad >= 0),
        activo BOOLEAN DEFAULT true,
        creado_en TIMESTAMP DEFAULT NOW()
      )
    `)
        console.log('Tabla "pruebas" creada');

        // Insertamos datos de prueba
        await client.query(`
      INSERT INTO pruebas (nombre, edad, activo) VALUES
        ('Juan Pérez', 28, true),
        ('María Gómez', 34, false),
        ('Carlos Ruiz', 19, true),
        ('Laura Sánchez', 45, true),
        ('Pedro López', 22, false)
    `);
        console.log('5 registros insertados en "pruebas"');
        // Terminamos transacción
        await client.query('COMMIT'); // Todo OK → guardamos cambios
        console.log('Seed completado con éxito');
    }
    catch (err) {
        await client.query("ROLLBACK")
        console.error("Error en el seed. Se ha hecho rollback", err.message)
        throw err
    } finally {
        client.release() // liberar el cliente del pool
    }
}

    seed()
        .then(() => process.exit(0))
        .catch(() => process.exit(1))