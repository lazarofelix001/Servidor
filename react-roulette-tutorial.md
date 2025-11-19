# Tutorial Completo: Crear una Ruleta de Apuestas en React
## Basado en las Unidades Didácticas 1 y 2

---

## 📚 Tabla de Contenidos
1. Configuración del proyecto con Vite
2. Conceptos de JavaScript moderno aplicados
3. Estructura de componentes en React
4. Manejo de eventos
5. Estado con useState y useReducer
6. Context API para estado global
7. Ciclo de vida con useEffect
8. Estilizado en React
9. Componentes reutilizables
10. Ejercicios prácticos

---

## 1. Configuración del Proyecto con Vite

### ¿Por qué Vite en lugar de Create React App?

Según tu UD2, **Vite** es mucho más rápido que Create React App (CRA) y ofrece:
- Inicio instantáneo del proyecto
- Hot Module Replacement (HMR) más rápido
- Mejor optimización para producción
- Configuración más ligera

### Paso 1: Crear el proyecto

```bash
npm create vite@latest ruleta-casino
```

Cuando te pregunte:
1. Selecciona **React**
2. Selecciona **JavaScript** (o TypeScript si prefieres)

### Paso 2: Instalar dependencias

```bash
cd ruleta-casino
npm install
npm install lucide-react  # Para los iconos
```

### Paso 3: Iniciar el servidor

```bash
npm run dev
```

Tu aplicación estará disponible en `http://localhost:5173`

---

## 2. Conceptos de JavaScript Moderno Aplicados

### 2.1 Destructuración de Objetos

En nuestra ruleta, usamos destructuración constantemente:

```javascript
// Destructuración de props
function Usuario({ nombre, edad }) {
  return <div>{nombre} tiene {edad} años</div>;
}

// Destructuración del estado
const { balance, bets, isSpinning } = state;
```

**Ejemplo en la ruleta:**
```javascript
function ControlApuesta() {
  const { state, dispatch } = useJuego(); // Destructuración del contexto
  const { betAmount } = state; // Destructuración del estado
  
  // ...
}
```

### 2.2 Destructuración de Arrays

Muy usado con hooks:

```javascript
// useState devuelve un array de 2 elementos
const [balance, setBalance] = useState(1000);
//     ↑           ↑              ↑
//   valor      función      valor inicial
```

### 2.3 Funciones Flecha

Las funciones flecha son más concisas y manejan `this` mejor:

```javascript
// Función tradicional
function sumar(a, b) {
  return a + b;
}

// Función flecha
const sumar = (a, b) => a + b;

// Función flecha con cuerpo
const handleClick = () => {
  console.log('Click!');
};
```

**En la ruleta:**
```javascript
const handleIncrementar = () => {
  dispatch({ type: 'SET_BET_AMOUNT', payload: betAmount + 10 });
};
```

### 2.4 Spread Operator (...)

Muy útil para copiar objetos o arrays sin modificar el original:

```javascript
// Copiar objeto
const nuevoEstado = { ...estadoAnterior, balance: 2000 };

// Copiar array
const nuevaLista = [...listaAnterior, nuevoElemento];
```

**En el reducer de la ruleta:**
```javascript
case 'PLACE_BET':
  return {
    ...state,  // Copia todas las propiedades del estado anterior
    bets: {
      ...state.bets,  // Copia todas las apuestas anteriores
      [action.payload.key]: (state.bets[action.payload.key] || 0) + state.betAmount
    }
  };
```

### 2.5 Módulos (import/export)

Organizamos el código en archivos separados:

```javascript
// Exportar componente
export function MiComponente() {
  return <div>Hola</div>;
}

// Exportar por defecto
export default App;

// Importar
import { MiComponente } from './MiComponente';
import App from './App';
```

---

## 3. Estructura de Componentes en React

### 3.1 JSX: La Base

JSX permite escribir HTML en JavaScript:

```javascript
function Saludo() {
  return (
    <div>
      <h1>¡Hola, mundo!</h1>
      <p>Este es JSX</p>
    </div>
  );
}
```

**Diferencias importantes con HTML:**
- `class` → `className`
- `onclick` → `onClick`
- Usar `{}` para insertar JavaScript: `<span>{balance}</span>`

### 3.2 Componentes Funcionales

Nuestra ruleta está construida con componentes funcionales:

```javascript
// Componente simple
function BotonApuesta({ numero, color, onClick }) {
  return (
    <button 
      onClick={onClick}
      className={`bg-${color}-600`}
    >
      {numero}
    </button>
  );
}

// Uso del componente
<BotonApuesta numero={7} color="red" onClick={handleClick} />
```

### 3.3 Props: Pasando Datos

Las props son como parámetros que pasamos a los componentes:

```javascript
// Componente padre
function App() {
  return <Usuario nombre="Juan" edad={25} />;
}

// Componente hijo recibe props
function Usuario({ nombre, edad }) {
  return <p>{nombre} tiene {edad} años</p>;
}
```

**En nuestra ruleta:**
```javascript
function NumeroHistorial({ numero }) {
  return <div>{numero.num}</div>;
}

// Uso
<NumeroHistorial numero={resultado} />
```

---

## 4. Manejo de Eventos

### 4.1 Eventos Básicos

Los eventos en React se escriben en camelCase:

```javascript
function Boton() {
  const handleClick = () => {
    console.log('¡Click!');
  };

  return <button onClick={handleClick}>Click aquí</button>;
}
```

**Eventos comunes:**
- `onClick`: Click del mouse
- `onChange`: Cambio en input
- `onSubmit`: Envío de formulario
- `onMouseEnter`: Mouse entra
- `onMouseLeave`: Mouse sale

### 4.2 Eventos con Parámetros

Para pasar parámetros a funciones de eventos:

```javascript
function TableroNumeros() {
  const placeBet = (numero) => {
    console.log(`Apostando al número ${numero}`);
  };

  return (
    <button onClick={() => placeBet(7)}>
      Apostar al 7
    </button>
  );
}
```

### 4.3 Prevenir Comportamiento por Defecto

Usamos `event.preventDefault()`:

```javascript
function Formulario() {
  const handleSubmit = (e) => {
    e.preventDefault();  // Evita recargar la página
    console.log('Formulario enviado');
  };

  return (
    <form onSubmit={handleSubmit}>
      <button type="submit">Enviar</button>
    </form>
  );
}
```

---

## 5. Estado con useState y useReducer

### 5.1 useState: Estado Simple

Para estados simples, usamos `useState`:

```javascript
import { useState } from 'react';

function Contador() {
  // Crear estado
  const [count, setCount] = useState(0);
  //     ↑         ↑           ↑
  //   valor   función    valor inicial

  const incrementar = () => {
    setCount(count + 1);  // Actualizar estado
  };

  return (
    <div>
      <p>Contador: {count}</p>
      <button onClick={incrementar}>+1</button>
    </div>
  );
}
```

**Uso en la ruleta (versión simple):**
```javascript
function ControlApuesta() {
  const [betAmount, setBetAmount] = useState(10);

  return (
    <button onClick={() => setBetAmount(betAmount + 10)}>
      +10
    </button>
  );
}
```

### 5.2 useReducer: Estado Complejo

Cuando el estado es complejo (como en nuestra ruleta), usamos `useReducer`:

#### ¿Por qué useReducer?

Según tu UD2, useReducer es mejor cuando:
- Tienes estado con múltiples valores relacionados
- Los cambios siguen reglas específicas
- El nuevo estado depende del anterior
- Necesitas lógica compleja para actualizar

#### Estructura de useReducer

```javascript
import { useReducer } from 'react';

// 1. Estado inicial
const estadoInicial = {
  balance: 1000,
  betAmount: 10,
  bets: {}
};

// 2. Función reductora (decide cómo cambia el estado)
function juegoReducer(state, action) {
  switch (action.type) {
    case 'SET_BET_AMOUNT':
      return { ...state, betAmount: action.payload };
    
    case 'PLACE_BET':
      return {
        ...state,
        bets: {
          ...state.bets,
          [action.payload.key]: action.payload.amount
        }
      };
    
    default:
      return state;
  }
}

// 3. Usar en componente
function Juego() {
  const [state, dispatch] = useReducer(juegoReducer, estadoInicial);
  
  // Para cambiar el estado, usamos dispatch
  const incrementarApuesta = () => {
    dispatch({ 
      type: 'SET_BET_AMOUNT', 
      payload: state.betAmount + 10 
    });
  };

  return <div>Balance: {state.balance}</div>;
}
```

#### Anatomía de una Acción

```javascript
dispatch({
  type: 'NOMBRE_DE_LA_ACCION',  // Qué hacer
  payload: datos                 // Datos necesarios
});
```

---

## 6. Context API para Estado Global

### 6.1 ¿Qué es el Context API?

El Context API permite **compartir estado** entre componentes sin pasar props manualmente por cada nivel (evita "prop drilling").

### 6.2 Crear un Contexto

**Paso 1: Crear el contexto**

```javascript
import { createContext, useContext } from 'react';

// Crear contexto
const JuegoContext = createContext();
```

**Paso 2: Crear el proveedor**

```javascript
function JuegoProvider({ children }) {
  const [state, dispatch] = useReducer(juegoReducer, estadoInicial);

  return (
    <JuegoContext.Provider value={{ state, dispatch }}>
      {children}
    </JuegoContext.Provider>
  );
}
```

**Paso 3: Crear un hook personalizado**

```javascript
function useJuego() {
  const context = useContext(JuegoContext);
  if (!context) {
    throw new Error('useJuego debe usarse dentro de JuegoProvider');
  }
  return context;
}
```

**Paso 4: Envolver la app con el proveedor**

```javascript
function App() {
  return (
    <JuegoProvider>
      <RouletteGame />
    </JuegoProvider>
  );
}
```

**Paso 5: Usar el contexto en cualquier componente**

```javascript
function ControlApuesta() {
  // Ahora podemos acceder al estado desde cualquier componente
  const { state, dispatch } = useJuego();
  
  return <div>Balance: {state.balance}</div>;
}
```

### 6.3 Ventajas del Context API

1. **No más prop drilling**: No necesitas pasar props por muchos niveles
2. **Estado centralizado**: Todo el estado del juego en un solo lugar
3. **Fácil de actualizar**: Cualquier componente puede actualizar el estado
4. **Mejor organización**: Código más limpio y mantenible

---

## 7. Ciclo de Vida con useEffect

### 7.1 ¿Qué es useEffect?

`useEffect` maneja **efectos secundarios**: operaciones que ocurren fuera del renderizado normal, como:
- Llamadas a APIs
- Temporizadores
- Suscripciones a eventos
- Modificaciones del DOM

### 7.2 Sintaxis Básica

```javascript
import { useEffect } from 'react';

useEffect(() => {
  // Código que se ejecuta después del renderizado
  console.log('Componente renderizado');

  return () => {
    // Función de limpieza (opcional)
    console.log('Componente desmontado');
  };
}, [dependencias]); // Array de dependencias
```

### 7.3 Ejemplos Prácticos

#### Ejemplo 1: Ejecutar solo al montar

```javascript
useEffect(() => {
  console.log('Componente montado por primera vez');
}, []); // Array vacío = solo al montar
```

#### Ejemplo 2: Ejecutar cuando algo cambia

```javascript
function Ruleta() {
  const [rotation, setRotation] = useState(0);

  useEffect(() => {
    console.log(`La ruleta giró ${rotation} grados`);
  }, [rotation]); // Se ejecuta cuando rotation cambia

  return <div>Rotación: {rotation}</div>;
}
```

#### Ejemplo 3: Temporizador con limpieza

```javascript
function Temporizador() {
  const [segundos, setSegundos] = useState(0);

  useEffect(() => {
    // Configurar intervalo
    const intervalo = setInterval(() => {
      setSegundos(s => s + 1);
    }, 1000);

    // Función de limpieza
    return () => clearInterval(intervalo);
  }, []);

  return <p>Segundos: {segundos}</p>;
}
```

#### Ejemplo 4: Llamada a API

```javascript
function ListaUsuarios() {
  const [usuarios, setUsuarios] = useState([]);

  useEffect(() => {
    fetch('https://api.example.com/usuarios')
      .then(response => response.json())
      .then(data => setUsuarios(data));
  }, []);

  return (
    <ul>
      {usuarios.map(u => <li key={u.id}>{u.nombre}</li>)}
    </ul>
  );
}
```

### 7.4 Aplicación en la Ruleta

Podríamos usar `useEffect` para:

```javascript
function RuletaConSonido() {
  const { state } = useJuego();
  const { isSpinning } = state;

  useEffect(() => {
    if (isSpinning) {
      // Reproducir sonido de ruleta
      const audio = new Audio('/ruleta.mp3');
      audio.play();

      return () => {
        // Detener sonido al desmontar
        audio.pause();
      };
    }
  }, [isSpinning]);

  return <div>...</div>;
}
```

---

## 8. Estilizado en React

### 8.1 Estilos en Línea

Aplicar estilos directamente en JSX con objetos JavaScript:

```javascript
function Caja() {
  const estilos = {
    backgroundColor: 'blue',  // camelCase!
    color: 'white',
    padding: '10px',
    borderRadius: '5px'
  };

  return <div style={estilos}>Contenido</div>;
}
```

**Estilos dinámicos:**
```javascript
function Boton({ activo }) {
  const estilos = {
    backgroundColor: activo ? 'green' : 'gray',
    color: 'white',
    padding: '10px'
  };

  return <button style={estilos}>Click</button>;
}
```

**En nuestra ruleta:**
```javascript
function ResultadoDisplay({ resultado }) {
  const estiloResultado = {
    backgroundColor: resultado.color === 'red' ? '#dc2626' : '#171717',
    color: 'white',
    padding: '12px 24px',
    borderRadius: '8px'
  };

  return <div style={estiloResultado}>{resultado.num}</div>;
}
```

### 8.2 Módulos CSS

Los módulos CSS son archivos `.module.css` que encapsulan estilos localmente:

**Archivo: Boton.module.css**
```css
.boton {
  background-color: green;
  color: white;
  padding: 10px;
  border-radius: 5px;
}

.boton:hover {
  background-color: darkgreen;
}

.botonActivo {
  background-color: blue;
}
```

**Componente: Boton.jsx**
```javascript
import styles from './Boton.module.css';

function Boton({ activo }) {
  return (
    <button className={activo ? styles.botonActivo : styles.boton}>
      Click
    </button>
  );
}
```

**Ventajas:**
- Sin colisiones de nombres
- Estilos encapsulados por componente
- Puedes usar pseudoclases (`:hover`, `:focus`)

### 8.3 Clases Condicionales

Aplicar clases según condiciones:

```javascript
function Alerta({ tipo }) {
  const clases = `alerta ${tipo === 'error' ? 'alerta-error' : 'alerta-info'}`;
  
  return <div className={clases}>Mensaje</div>;
}
```

---

## 9. Componentes Reutilizables

### 9.1 Principio de Reutilización

Un componente debe ser:
1. **Independiente**: Funciona por sí solo
2. **Reutilizable**: Se puede usar en múltiples lugares
3. **Configurable**: Acepta props para personalizarlo

### 9.2 Renderizado de Listas con .map()

Para mostrar listas de datos, usamos `.map()`:

```javascript
function ListaNombres() {
  const nombres = ['Juan', 'Ana', 'Carlos'];

  return (
    <ul>
      {nombres.map((nombre, index) => (
        <li key={index}>{nombre}</li>
      ))}
    </ul>
  );
}
```

**Con objetos y keys únicas:**
```javascript
function ListaPersonas() {
  const personas = [
    { id: 1, nombre: 'Juan', edad: 25 },
    { id: 2, nombre: 'Ana', edad: 30 }
  ];

  return (
    <ul>
      {personas.map(persona => (
        <li key={persona.id}>
          {persona.nombre} - {persona.edad} años
        </li>
      ))}
    </ul>
  );
}
```

### 9.3 Componentes Reutilizables en la Ruleta

#### Componente Ficha

```javascript
function Ficha({ amount }) {
  return (
    <span className="absolute top-0 right-0 bg-yellow-500 text-black text-xs px-1">
      ${amount}
    </span>
  );
}

// Uso
<Ficha amount={50} />
```

#### Componente Botón de Apuesta

```javascript
function BotonApuesta({ numero, color, bet, onClick, disabled }) {
  const estiloBoton = {
    backgroundColor: color === 'red' ? '#dc2626' : '#171717'
  };

  return (
    <button
      onClick={onClick}
      disabled={disabled}
      style={estiloBoton}
      className="relative h-12 hover:opacity-80"
    >
      {numero}
      {bet > 0 && <Ficha amount={bet} />}
    </button>
  );
}

// Uso
<BotonApuesta 
  numero={7} 
  color="red" 
  bet={50} 
  onClick={() => console.log('Apostando')}
  disabled={false}
/>
```

#### Componente Historial

```javascript
function NumeroHistorial({ numero }) {
  const estilos = {
    backgroundColor: numero.color === 'red' ? '#dc2626' : '#171717',
    color: 'white'
  };

  return <div style={estilos}>{numero.num}</div>;
}

// Uso con .map()
function Historial({ history }) {
  return (
    <div>
      {history.map((numero, index) => (
        <NumeroHistorial key={index} numero={numero} />
      ))}
    </div>
  );
}
```

---

## 10. Ejercicios Prácticos

### Ejercicio 1: Contador Simple
Crea un contador con `useState`:
- Botón para incrementar
- Botón para decrementar
- Botón para resetear

```javascript
function Contador() {
  const [count, setCount] = useState(0);

  return (
    <div>
      <p>Contador: {count}</p>
      <button onClick={() => setCount(count + 1)}>+</button>
      <button onClick={() => setCount(count - 1)}>-</button>
      <button onClick={() => setCount(0)}>Reset</button>
    </div>
  );
}
```

### Ejercicio 2: Formulario Controlado
Crea un formulario que maneje nombre y email:

```javascript
function Formulario() {
  const [form, setForm] = useState({ nombre: '', email: '' });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setForm({ ...form, [name]: value });
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log('Datos:', form);
  };

  return (
    <form onSubmit={handleSubmit}>
      <input 
        name="nombre" 
        value={form.nombre} 
        onChange={handleChange} 
        placeholder="Nombre"
      />
      <input 
        name="email" 
        value={form.email} 
        onChange={handleChange} 
        placeholder="Email"
      />
      <button type="submit">Enviar</button>
    </form>
  );
}
```

### Ejercicio 3: Lista de Tareas
Crea una lista de tareas con:
- Input para añadir tareas
- Lista que muestra las tareas
- Botón para eliminar cada tarea

```javascript
function ListaTareas() {
  const [tareas, setTareas] = useState([]);
  const [nuevaTarea, setNuevaTarea] = useState('');

  const agregarTarea = () => {
    setTareas([...tareas, { id: Date.now(), texto: nuevaTarea }]);
    setNuevaTarea('');
  };

  const eliminarTarea = (id) => {
    setTareas(tareas.filter(t => t.id !== id));
  };

  return (
    <div>
      <input 
        value={nuevaTarea}
        onChange={(e) => setNuevaTarea(e.target.value)}
      />
      <button onClick={agregarTarea}>Añadir</button>
      
      <ul>
        {tareas.map(tarea => (
          <li key={tarea.id}>
            {tarea.texto}
            <button onClick={() => eliminarTarea(tarea.id)}>X</button>
          </li>
        ))}
      </ul>
    </div>
  );
}
```

### Ejercicio 4: Modificar la Ruleta
Desafíos para practicar:

1. **Añadir sonidos**: Usa `useEffect` para reproducir un sonido cuando gira
2. **Cambiar multiplicadores**: Modifica el reducer para que los números paguen 40x en vez de 36x
3. **Añadir límite de apuesta**: No permitir apuestas mayores al balance
4. **Estadísticas**: Mostrar qué color ha salido más veces
5. **Modo oscuro**: Añade un botón para cambiar entre tema claro y oscuro usando Context API

---

## 11. Resumen de Conceptos Clave

### JavaScript Moderno (ES6+)
✅ Destructuración de objetos y arrays
✅ Funciones flecha
✅ Spread operator (...)
✅ Módulos (import/export)

### React Básico
✅ JSX y componentes funcionales
✅ Props para pasar datos
✅ Manejo de eventos (onClick, onChange)

### Gestión de Estado
✅ `useState` para estado simple
✅ `useReducer` para estado complejo
✅ Context API para estado global

### Efectos y Ciclo de Vida
✅ `useEffect` para efectos secundarios
✅ Limpieza de efectos
✅ Dependencias en useEffect

### Estilizado
✅ Estilos en línea
✅ Módulos CSS
✅ Clases condicionales

### Componentes Reutilizables
✅ Renderizado de listas con `.map()`
✅ Props para personalización
✅ Key única para cada elemento

---

## 12. Recursos Adicionales

### Documentación Oficial
- [React.dev](https://react.dev) - Documentación oficial
- [Vite Guide](https://vitejs.dev/guide/) - Guía de Vite

### Práctica
- Modifica la ruleta paso a paso
- Crea tus propios componentes
- Experimenta con el Context API

### Siguiente Nivel
- Aprende TypeScript
- Estudia React Router para navegación
- Explora librerías de UI (Material-UI, shadcn/ui)

---

¡Felicidades! Ahora tienes una comprensión completa de cómo construir aplicaciones React siguiendo las mejores prácticas de las Unidades Didácticas 1 y 2. 🚀