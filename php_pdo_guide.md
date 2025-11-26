# Guía PHP PDO - CRUD con MySQL

## 🔗 1. CONEXIÓN A LA BASE DE DATOS

```php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=DB_USUARIOS", "root", "1234");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
```

**Conceptos clave:**
- `PDO` = PHP Data Objects (forma segura de conectarse a bases de datos)
- `try-catch` = Intenta conectar, si falla captura el error
- `setAttribute()` = Configura PDO para mostrar errores claros

---

## 📖 2. SELECCIONAR TODOS LOS USUARIOS

```php
$stmt = $conexion->prepare("SELECT * FROM USUARIO");
$stmt->execute();
$resultado = $stmt->fetchAll();

foreach ($resultado as $numeroFila => $fila) {
    print_r($fila);
}
```

**¿Qué hace?**
- `prepare()` = Prepara la consulta
- `execute()` = Ejecuta la consulta
- `fetchAll()` = Devuelve **todos** los resultados en un array

---

## 🔍 3. SELECCIONAR UN USUARIO ESPECÍFICO

```php
$id = 1;
$stmt = $conexion->prepare("SELECT * FROM USUARIO WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$resultado = $stmt->fetch();
```

**¿Qué hace?**
- `:id` = Marcador de posición (placeholder)
- `bindParam()` = Asigna el valor de forma segura
- `fetch()` = Devuelve **solo una** fila

---

## ➕ 4. INSERTAR UN USUARIO

```php
$stmt = $conexion->prepare("INSERT INTO USUARIO(NOMBRE, EDAD) VALUES(:nombre, :edad)");

$nombre = "Evaristo";
$edad = 22;

$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':edad', $edad);

$ejecucion = $stmt->execute();  // Devuelve true/false
```

**¿Qué hace?**
- `INSERT INTO` = Añade un nuevo registro
- `VALUES(:nombre, :edad)` = Marcadores para los valores
- `execute()` devuelve `true` si tuvo éxito, `false` si falló

---

## 🗑️ 5. BORRAR UN USUARIO

```php
$stmt = $conexion->prepare("DELETE FROM USUARIO WHERE ID=:id");

$id = 5;
$stmt->bindParam(':id', $id);

$ejecucion = $stmt->execute();
```

**¿Qué hace?**
- `DELETE FROM` = Borra registros
- `WHERE ID=:id` = Solo borra el que coincida con ese ID

---

## ✏️ 6. ACTUALIZAR UN USUARIO

```php
$stmt = $conexion->prepare("UPDATE USUARIO SET NOMBRE=:nombre WHERE ID=:id");

$id = 8;
$nombre = "Evaristo lider clon";

$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);

$ejecucion = $stmt->execute();
```

**¿Qué hace?**
- `UPDATE` = Modifica registros existentes
- `SET NOMBRE=:nombre` = Cambia el valor de la columna NOMBRE
- `WHERE ID=:id` = Solo modifica el registro con ese ID

---

## 🚨 7. INYECCIÓN SQL (IMPORTANTE)

### ❌ VULNERABLE - LO QUE NO DEBES HACER:

```php
$id = "8; DROP TABLE USUARIO;";
$consulta = "SELECT * FROM USUARIO WHERE id = ".$id;  // Concatenación directa
$stmt = $conexion->prepare($consulta);
$stmt->execute();
// ⚠️ Esto SÍ ejecutaría DROP TABLE y borraría la tabla
```

### ✅ SEGURO - LO CORRECTO:

```php
$id = "8; DROP TABLE USUARIO;";
$stmt = $conexion->prepare("SELECT * FROM USUARIO WHERE id = :id");
$stmt->bindParam(':id', $id);  // Trata $id como dato, no como código
$stmt->execute();
// ✅ Esto NO ejecuta DROP TABLE, busca literalmente ese texto como ID
```

**Regla de oro:** Nunca concatenes variables en consultas SQL. Siempre usa marcadores (`:nombre`) + `bindParam()`.

---

## 📋 RESUMEN DE MÉTODOS

| Método | Descripción |
|--------|-------------|
| `prepare($sql)` | Prepara una consulta SQL |
| `execute()` | Ejecuta la consulta preparada |
| `bindParam($marcador, $variable)` | Asigna valores de forma segura |
| `fetch()` | Devuelve **una** fila de resultados |
| `fetchAll()` | Devuelve **todas** las filas de resultados |

---

## 🎯 PATRÓN BÁSICO PARA CUALQUIER OPERACIÓN

```php
// 1. Preparar con marcadores
$stmt = $conexion->prepare("SQL CON :marcadores");

// 2. Asignar valores
$stmt->bindParam(':marcador', $variable);

// 3. Ejecutar
$stmt->execute();

// 4. Obtener resultados (solo en SELECT)
$resultado = $stmt->fetch();  // o fetchAll()
```