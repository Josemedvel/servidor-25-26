import { contextBridge } from "electron"
import os from "os"

contextBridge.exposeInMainWorld("os", {
    platform: os.platform,
    arch: os.arch,
    hostname: os.hostname,
    type: os.type,
    release: os.release,
    totalmem: os.totalmem,
    freemem: os.freemem,
    cpus: os.cpus
})