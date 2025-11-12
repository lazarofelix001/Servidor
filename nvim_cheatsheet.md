# 🎯 Neovim Cheat Sheet - Tus Atajos Configurados

**Leader Key:** `Space` (barra espaciadora)

---

## 📝 Modos de Vim

| Tecla | Modo | Descripción |
|-------|------|-------------|
| `ESC` | Normal | Salir de cualquier modo, volver a Normal |
| `i` | Insert | Insertar ANTES del cursor |
| `a` | Insert | Insertar DESPUÉS del cursor |
| `I` | Insert | Insertar al INICIO de la línea |
| `A` | Insert | Insertar al FINAL de la línea |
| `o` | Insert | Nueva línea DEBAJO y entrar en Insert |
| `O` | Insert | Nueva línea ARRIBA y entrar en Insert |
| `v` | Visual | Selección de caracteres |
| `V` | Visual | Selección de líneas completas |
| `Ctrl+v` | Visual Block | Selección en bloque/columna |

---

## ✂️ Copiar, Cortar y Pegar

### En el portapapeles del sistema (para copiar a otras apps):

| Comando | Acción |
|---------|--------|
| `,+yy` | Copiar línea actual al portapapeles |
| `,+5yy` | Copiar 5 líneas al portapapeles |
| `,+y` | Copiar selección al portapapeles (en modo Visual) |
| `,+p` | Pegar desde el portapapeles |
| `,+P` | Pegar ANTES del cursor |

### En el portapapeles interno de Vim:

| Comando | Acción |
|---------|--------|
| `yy` | Copiar línea |
| `dd` | Cortar línea |
| `yw` | Copiar palabra |
| `dw` | Cortar palabra |
| `y$` | Copiar hasta el final de la línea |
| `d$` | Cortar hasta el final de la línea |
| `p` | Pegar después |
| `P` | Pegar antes |

### 💡 Proceso completo para copiar texto:
1. Presiona `v` (modo visual)
2. Mueve el cursor para seleccionar (flechas o `hjkl`)
3. Presiona `"+y` (copiar al portapapeles)
4. En otra app: `Ctrl+V` para pegar

---

## 🔭 Telescope (Búsqueda de Archivos)

| Atajo | Acción |
|-------|--------|
| `Ctrl+p` | **Buscar archivos** en el proyecto |
| `Space+fg` | **Buscar texto** (live grep) en todos los archivos |
| `Space+Space` | **Archivos recientes** (oldfiles) |

### Dentro de Telescope:
| Tecla | Acción |
|-------|--------|
| `↑` `↓` o `Ctrl+n` `Ctrl+p` | Navegar resultados |
| `Enter` | Abrir archivo |
| `Ctrl+x` | Abrir en split horizontal |
| `Ctrl+v` | Abrir en split vertical |
| `Ctrl+t` | Abrir en nueva pestaña |
| `ESC` | Cerrar Telescope |

---

## 🪟 Navegación entre Ventanas (Panes)

| Atajo | Acción |
|-------|--------|
| `Ctrl+h` | Ir a ventana IZQUIERDA |
| `Ctrl+j` | Ir a ventana ABAJO |
| `Ctrl+k` | Ir a ventana ARRIBA |
| `Ctrl+l` | Ir a ventana DERECHA |

### Gestión de Ventanas:
| Comando | Acción |
|---------|--------|
| `:split` o `:sp` | Dividir horizontal |
| `:vsplit` o `:vsp` | Dividir vertical |
| `:q` | Cerrar ventana actual |
| `:only` | Cerrar todas menos la actual |

---

## 🔧 LSP (Autocompletado e Inteligencia)

| Atajo | Acción |
|-------|--------|
| `K` | Ver **documentación** de función/variable |
| `Space+gd` | Ir a **definición** |
| `Space+gr` | Ver **referencias** |
| `Space+ca` | **Code actions** (acciones rápidas) |

---

## 🔍 Búsqueda y Navegación

| Atajo | Acción |
|-------|--------|
| `/texto` | Buscar "texto" hacia adelante |
| `?texto` | Buscar "texto" hacia atrás |
| `n` | Siguiente resultado |
| `N` | Resultado anterior |
| `Space+h` | **Quitar resaltado** de búsqueda |
| `*` | Buscar palabra bajo el cursor |

---

## 🚀 Movimientos Rápidos

| Tecla | Acción |
|-------|--------|
| `gg` | Ir al **inicio** del archivo |
| `G` | Ir al **final** del archivo |
| `0` | Ir al **inicio** de la línea |
| `$` | Ir al **final** de la línea |
| `w` | Siguiente **palabra** |
| `b` | Palabra **anterior** |
| `{` | Párrafo anterior |
| `}` | Párrafo siguiente |
| `%` | Ir al paréntesis/llave coincidente |
| `Ctrl+u` | Media página arriba |
| `Ctrl+d` | Media página abajo |

---

## 💾 Guardar y Salir

| Comando | Acción |
|---------|--------|
| `:w` | Guardar |
| `:q` | Salir |
| `:wq` o `:x` | Guardar y salir |
| `:q!` | Salir sin guardar |
| `:wa` | Guardar todos los archivos |
| `:qa` | Cerrar todos |

---

## ↩️ Deshacer y Rehacer

| Tecla | Acción |
|-------|--------|
| `u` | Deshacer |
| `Ctrl+r` | Rehacer |
| `.` | Repetir última acción |

---

## 🎨 Configuración Actual

- **Tab:** 2 espacios
- **Leader:** Espacio
- **Números de línea:** Activados
- **Swap files:** Desactivados

---

## 💡 Tips Rápidos

### Para copiar TODO un archivo al portapapeles:
```
gg"+yG
```
(Ir al inicio + copiar al portapapeles + ir al final)

### Para seleccionar TODO un archivo:
```
ggVG
```
(Ir al inicio + Visual línea + ir al final)

### Para buscar y reemplazar:
```
:%s/viejo/nuevo/g
```
(Reemplazar "viejo" por "nuevo" en todo el archivo)

---

## 🆘 Ayuda

| Comando | Acción |
|---------|--------|
| `:help <tema>` | Ver ayuda sobre un tema |
| `:Telescope help_tags` | Buscar en la ayuda con Telescope |
| `Space+fh` | Lo mismo que arriba (si está configurado) |
