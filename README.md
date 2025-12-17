## Mis Decisiones de Diseño

### 1. 🗄️ Estructura de la Tabla `vehiculos`

| Campo         | Tipo          | Obligatorio | Descripción                                   |
|--------------|----------------|-------------|-----------------------------------------------|
| id           | BIGINT (PK)    | Sí          | Identificador único del vehículo              |
| placa        | VARCHAR(10)    | Sí          | Placa del vehículo                            |
| tipo         | VARCHAR(20)    | Sí          | Tipo de vehículo (Automóvil, Moto, etc.)      |
| propietario  | VARCHAR(100)   | No          | Nombre del propietario                        |
| observaciones| TEXT           | No          | Notas adicionales                             |
| estado       | VARCHAR(20)    | Sí          | Estado del vehículo: `ingreso` o `salida`     |
| hora_salida  | TIMESTAMP      | No          | Fecha y hora en que el vehículo salió         |
| created_at   | TIMESTAMP      | No          | Creación del registro                         |
| updated_at   | TIMESTAMP      | No          | Última actualización del registro             |

---

### 2.Tipos de vehículo permitidos

- Automóvil  
- Motocicleta  
- Camioneta  

---

### 3. ¿Se pueden eliminar registros?

**Respuesta:** No.  
**Razón:** Los registros deben conservarse para mantener un histórico del movimiento de vehículos.  
En lugar de eliminar, se aplica un **borrado lógico** usando el campo `estado = 'salida'`.

---

<img width="540" height="1206" alt="imagen" src="https://github.com/user-attachments/assets/7ed5716d-2e9b-4181-83d4-ef37b1e6134e" />

<img width="1394" height="613" alt="imagen" src="https://github.com/user-attachments/assets/2299a03e-5fb6-45fe-bc18-e77de3d0097c" />

<img width="1372" height="430" alt="imagen" src="https://github.com/user-attachments/assets/5aa09ecc-ccf4-430e-afa4-850a9884f8a2" />
